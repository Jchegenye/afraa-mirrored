<?php

namespace Afraa\Http\Controllers\Auth;

use Afraa\User;
use Afraa\Model\Admin\Users\VerifyUser;
use Afraa\Mail\VerifyMail;
use Afraa\Http\Controllers\Controller;
use Afraa\Legibra\ReusableCodes\GenerateCustomVerifyTokenTrait;
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
    use GenerateCustomVerifyTokenTrait;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

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
     * Show regisration form/page
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
            'name' => 'required|unique:users,name|min:4',
            'email' => 'email|unique:users,email|required',
            'password' => 'required|min:6|max:20|unique:users,password',
            'password_confirmation' => 'required|same:password',
            'g-recaptcha-response' => 'required',
        ]);
    }

    /**
     * Store user data & send verification email to user.
     * 
     * @author Jackson A. Chegenye
     * @param  array  $data
     * @return array
     */
    protected function create(array $data)
    {

        //Fetch the first USER ID
        $users_uid = User::orderBy('uid', 'DESC')->take(1)->get();

        //Finally we get to store all our documents here
        $user = new User;

        //Get the auto-generated code from REUSABLE CODE
        $code = $this->generatePermissionsCode();

        //Attach guest permission temporary
        $permission = [
            'access_to_guest_page',
        ];
        $getPermission = json_encode($permission);

        //list users, begin at 3
        if ($users_uid->isEmpty()) {
            $user->uid=3;
        }
        else {
            foreach ($users_uid as $count) {
                $uid = $count->uid;
                $user->uid = $uid+3;
            }
        }
        
        $user->name = Input::get('name');
        $user->email = Input::get('email');
        $user->password = Hash::make(Input::get('password'));
        $user->remember_token = Input::get('_token');
        $user->role = 'lounge';
        
        $user->permission = $getPermission;
        $user->verification_token = $code;
        $user->save();

        $verifyUser = VerifyUser::create([
            'user_uid' => $user->uid,
            'token' => sha1(time())
        ]);

        \Mail::to($user->email)->send(new VerifyMail($user));

        return $user;

    }

    /**
     * Verify User Registration here.
     * 
     * @author Jackson A. Chegenye
     * @param  array  $token
     * @return \Afraa\verifyUser
     */
    protected function verifyUser($token)
    {

            $verifyUser = VerifyUser::where('token', $token)->first();

            if(isset($verifyUser))
            {

                $user = $verifyUser->user;
                if(!$user->verified) {
                $verifyUser->user->verified = 1;
                $verifyUser->user->save();
                $status = "Your e-mail is verified. You can now login.";

                }else {

                    $status = "Your e-mail is already verified. You can now login.";
                    
                }

            } else {

                return redirect('/login')->with('warning', "Sorry your email cannot be identified.");

            }

        return redirect('/login')->with('status', $status);
        
    }

    /**
     * Check if the user is activated.
     * 
     * @author Jackson A. Chegenye
     * @param  array  $user
     * @return session
     */
    protected function registered(Request $request, $user)
    {

        $this->guard()->logout();

        return redirect('/login')->with('status', 'We sent you an activation code. Check your email and click on the link to verify.');
        
    }
    
}
