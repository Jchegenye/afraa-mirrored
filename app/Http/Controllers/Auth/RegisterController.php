<?php

namespace Afraa\Http\Controllers\Auth;

use Afraa\User;
use Afraa\Model\Admin\Users\VerifyUser;
use Afraa\Mail\VerifyMail;
use Afraa\Http\Controllers\Controller;
use Afraa\Legibra\ReusableCodes\DateFormats;
use Afraa\Legibra\ReusableCodes\VerificationCodeGenerator;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Exception;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show regisration page.
     *
     * @author Jackson A. Chegenye
     * @return string
     */
    public function showRegistrationForm(){

        return view('auth.users.register');

    }

    /**
     * Get a validator for an incoming registration request.
     * 
     * @author Jackson A. Chegenye
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            // 'name' => 'required|unique:users,name|min:4',
            // 'email' => 'email|unique:users,email|required',
            // 'password' => 'required|min:6|max:20|unique:users,password',
            // 'password_confirmation' => 'required|same:password',
            // 'g-recaptcha-response' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     * 
     * @author Jackson A. Chegenye
     * @param  array  $data
     * @return \Afraa\User
     */
    // public function store(Request $request, VerificationCodeGenerator $code){

    //     //validate fields

    //     $validator = Validator::make($request->all(), [
    //         // 'name' => 'required|unique:users,name|min:4',
    //         // 'email' => 'email|unique:users,email|required',
    //         // 'password' => 'required|min:6|max:20|unique:users,password',
    //         // 'password_confirmation' => 'required|same:password',
    //         //'g-recaptcha-response' => 'required',
    //     ]);

    //     if ($validator -> passes()) {

    //         //Try to connect to internet first
    //         try {

    //             //Get the auto-generated code from REUSABLE CODE
    //             $new_code = new VerificationCodeGenerator();
    //             $code = $new_code->generateRegistrationVerifyCode($code);

    //             $data = array(

    //                 'name' => $request->input('name'),
    //                 'email' => $request->input('email'),
    //                 'password' => $request->input('password'),
    //                 'confirm_url' => URL::to('/') . '/user/verify/' . $code,
    //                 '_token' => $request->input('_token'),

    //             );

    //             $sender = getenv('SUPPORT_EMAIL');
    //             $fromEmail = $request->input('email');

    //             Mail::send('emails.auth.users.successful-signup', $data, function ($message) use ($fromEmail, $sender) {
    //                 $message->from($sender, 'African Airlines Association');
    //                 $message->to($fromEmail)->subject('Registration | African Airlines Association');
    //             });

    //         //return an exception error if there was no internet connections to send mail.
    //         } catch (Exception $e) {

    //             if ($e instanceof \Swift_SwiftException) {
                    
    //                 $request->session()->flush('unsuccessful', 'Sorry, we could NOT sign you. Check your INTERNET CONNECTIONS and try again!');
    //                 return redirect()->back()->withInput();
    //             }

    //         }

    //         //Store email once there is connection and send an email
    //         {

    //             //Fetch the first USER ID
    //             $users_uid = User::orderBy('uid', 'DESC')->take(1)->get();

    //             //Finally we get to store all our documents here
    //             $users = new User;

    //             //Attache guest permission temporary
    //             $permission = [
    //                 'access_to_guest_page',
    //             ];
    //             $getPermission = json_encode($permission);

    //             //Lets auto generate unique USER ID
    //             if ($users_uid->isEmpty()) {
    //                 $users->uid=3;
    //             }
    //             else {
    //                 foreach ($users_uid as $count) {
    //                     $uid = $count->uid;
    //                     $users->uid = $uid+3;
    //                 }
    //             }
    //             $users->name = $request->input('name');
    //             $users->email = $request->input('email');
    //             $users->password = Hash::make($request->input('password'));
    //             $users->remember_token = $request->input('_token');
    //             $users->role = 'guest';
    //             $users->permission = $getPermission;
    //             //$users->verification_token = $code;
    //             $users->confirmation_code = '0';
    //             $users->save();

    //             $verifyUser = VerifyUser::create([
    //                 'user_uid' => $users->uid,
    //                 'token' => $code
    //             ]);

    //             $theusers = $users;
    //             $this->say($theusers);

    //             //return $users;

    //             // redirect
    //             return redirect('login')->with('successful', 'Thank you, before proceeding, please check your email for a verification link!');

    //         }

    //     } else {

    //         return redirect('signup')->withErrors($validator)->withInput();
            
    //     }

    // }

    protected function create(array $data)
    {

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $verifyUser = VerifyUser::create([
            'user_uid' => $user->uid,
            'token' => str_random(40)
        ]);

        Mail::to($user->email)->send(new VerifyMail($user));

        return $user;
    }

    /**
     * Verify user
     * 
     * @author Jackson A. Chegenye
     * @param  array  $token
     * @return \Afraa\verifyUser
     */
    public function verifyUser($token)

    {

        $verifyUser = VerifyUser::where('token', $token)->first();

        if(isset($verifyUser) ){
            $user = $verifyUser->user;
            if(!$user->verified) {
                $verifyUser->user->verified = 1;
                $verifyUser->user->save();
                $status = "Your e-mail is verified. You can now login.";
            }else{
                $status = "Your e-mail is already verified. You can now login.";
            }
        }else{
            return redirect('/login')->with('warning', "Sorry your email cannot be identified.")->withInput();
        }

        return redirect('/login')->with('status', $status)->withInput();
    }

    protected function registered(Request $request, $user)
    {
        $this->guard()->logout();
        return redirect('/login')->with('status', 'We sent you an activation code. Check your email and click on the link to verify.');
    }
    
}
