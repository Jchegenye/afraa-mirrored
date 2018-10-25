<?php

namespace Afraa\Http\Controllers\Auth\Users;

use Validator;
use Illuminate\Http\Request;
use Afraa\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

use Afraa\Model\Admin\Users\User;
use Afraa\Legibra\ReusableCodes\DateFormats;
use Afraa\Legibra\ReusableCodes\VerificationCodeGenerator;

class RegistrationController extends Controller
{
    
    /**
     * Show regisration page.
     *
     * @author Jackson A. Chegenye
     * @return string
     */
    public function show(){

        return view('auth.users.register');

    }

    /**
     * Store regisration details.
     *
     * @author Jackson A. Chegenye
     * @return string
     */
    public function store(Request $request, VerificationCodeGenerator $code){

        //validate fields

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:users,name|min:4',
            'email' => 'email|unique:users,email|required',
            'password' => 'required|min:6|max:20|unique:users,password',
            'password_confirmation' => 'required|same:password',
            //'g-recaptcha-response' => 'required',
        ]
        // [
        //     'name.required' => ' The name field is required.',
        //     'name.min' => ' The name must be at least 4 characters.',
        //     'password.max' => ' The password may not be greater than 20 characters.',
        //     'password.min' => ' The password must be at least 6 characters.',
        // ]
    );

        if ($validator -> passes()) {

            //Try to connect to internet first
            try {

                //Get the auto-generated code from REUSABLE CODE
                $new_code = new VerificationCodeGenerator();
                $code = $new_code->generateRegistrationVerifyCode($code);

                $data = array(

                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' => $request->input('password'),
                    'confirm_url' => URL::to('/') . '/account/verify/' . $code,
                    '_token' => $request->input('_token'),

                );

                //if (app()->environment() == 'production') {

                    $sender = getenv('SUPPORT_EMAIL');
                    $fromEmail = $request->input('email');

                    Mail::send('emails.auth.users.successful-signup', $data, function ($message) use ($fromEmail, $sender) {
                        $message->from($sender, 'African Airlines Association');
                        $message->to($fromEmail)->subject('Registration | African Airlines Association');
                    });

                //}

            //return an exception error if there was no internet connections to send mail.
            } catch (Exception $e) {

                if ($e instanceof \Swift_SwiftException) {
                    
                    $request->session()->flush('unsuccessful', 'Sorry, we could NOT sign you. Check your INTERNET CONNECTIONS and try again!');
                    return redirect()->back()->withInput();
                }

            }

            //Store email once there is connection and send an email
            {

                //Fetch the first USER ID
                $users_uid = User::orderBy('uid', 'DESC')->take(1)->get();

                //Finally we get to store all our documents here
                $signups = new User;

                //Attache guest permission temporary
                $permission = [
                    'access_to_guest_page',
                ];
                $getPermission = json_encode($permission);

                //Lets auto generate unique USER ID
                if ($users_uid->isEmpty()) {
                    $signups->uid=3;
                }
                else {
                    foreach ($users_uid as $count) {
                        $uid = $count->uid;
                        $signups->uid = $uid+3;
                    }
                }
                $signups->name = $request->input('name');
                $signups->email = $request->input('email');
                $signups->password = Hash::make($request->input('password'));
                $signups->remember_token = $request->input('_token');
                $signups->role = 'guest';
                $signups->permission = $getPermission;
                $signups->verification_token = $code;
                $signups->confirmation_code = '0';
                $signups->save();

                // redirect
                return redirect('login')->with('successful', 'Thank you, before proceeding, please check your email for a verification link!');
                
                //resend
                //return view('auth.users.verify');

            }

        } else {

            return redirect('signup')->withErrors($validator)->withInput();
            
        }

    }

    /**
     * Verify Account regisration details.
     *
     * @author Jackson A. Chegenye
     * @return string
     */
    public function verifyAccount($token)
    {

        $user = User::where('confirmation_code', 0)
            ->where('verification_token',$token)
            ->first();

        if (isset($user)) {

            //Lets Get the DATES class we had set
            $date = new DateFormats();
            $DateType1 = $date->date();

            //Confirm the account
            $user->confirmation_code = '1';
            $user->confirmed_date = $DateType1['DateType1'];
            $user->save();

            $data = array(

                'name' => $user->name,
                'email' => $user->email,
                'password' => $user->password

            );

            $fromEmail = getenv('SUPPORT_EMAIL');
            $toEmail = $user->email;

            Mail::send('emails.auth.users.account-verified', $data, function ($message) use ($toEmail, $fromEmail) {
                $message->from($fromEmail, 'African Airlines Association');
                $message->to($toEmail)->subject('Account Verification | African Airlines Association');
            });

            return redirect('login')->with('successful', 'Your account is verified!');

        }
        else {

            return redirect('signup')->with('unsuccessful', 'Sorry, this token has been used!');

        }

    }

}
