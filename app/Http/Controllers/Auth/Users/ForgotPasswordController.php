<?php

namespace Afraa\Http\Controllers\Auth\Users;

use Afraa\User;
use Afraa\Legibra\ReusableCodes\DateFormatsTrait;
use Afraa\Legibra\ReusableCodes\GenerateCustomVerifyTokenTrait;
use Afraa\Model\Admin\Users\ResetPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Afraa\Http\Controllers\Controller;
use Exception;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use DateFormatsTrait;
    use GenerateCustomVerifyTokenTrait;

    /**
     * Create a new controller instance.
     * 
     * @author Jackson A. Chegenye
     * @return view
     */
    public function showMyLinkRequestForm(){

        return view('auth.passwords.users.email');

    }

    /**
     * Generate & send reset link.
     * 
     * @author Jackson A. Chegenye
     * @return resetlink
     */
    public function sendMyResetLinkEmail(){

        $getCode = $this->generatePermissionsCode();

        $rules = array(
            'email' => 'required|email|max:255',
            'g-recaptcha-response' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {

            return Redirect::back()
                ->withErrors($validator)
                ->withInput(Input::except('password'));

        }
        else{

            $user = User::where('email', '=', Input::get('email'))->first();

            if($user){

                $resetRequest = ResetPassword::where('user_uid','=', $user->uid)->first();

                if(empty($resetRequest)){

                    echo "yes";

                    $newRequest = new ResetPassword;
                    $newRequest->user_uid = $user->uid;
                    $newRequest->email = $user->email;
                    $newRequest->token = $user->remember_token;
                    $newRequest->save();

                }else {

                    echo "no";
                    $updateRequest = ResetPassword::where('user_uid','=', $user->uid)->update(
                        [   
                            'token' => $getCode,
                        ]
                    );

                    $newRequestCode = User::where('uid','=', $resetRequest->user_uid
                    )->update(
                        [   
                            'remember_token' => $getCode,
                        ]
                    );

                }

                $getData = ResetPassword::where('user_uid', '=', $user->uid)->first();
                $email = $user->email;
                $sendto = getenv('SUPPORT_EMAIL');
                $data = array(
                    'name' => $user->name,
                    'reset_url' => URL::to('/') . '/passw/reset/' . $getData->token,
                );
                Mail::send('emails.auth.users.password.password-reset-link', $data, function ($message) use ($email, $sendto) {
                    $message->from($sendto, 'African Airlines Association');
                    $message->to($email)->subject('Password Reset | African Airlines Association');
                });

                Session::flash('successful', 'We found, your email, kindly check your email for password reset link!'/*$this->getSuccessMessagesReset()*/);
                return redirect()->back()->withInput();

            }else{

                Session::flash('unsuccessful', 'No record was found matching your email!' /*"$this->getFailedMessagesReset()"*/ );
                return redirect()->back()->withInput();

            }

        }

    }

    /**
     * Display reset page with token
     * 
     * @author Jackson A. Chegenye
     * @return resetlink
     */
    public function showMyResetForm($token){

        $myToken = ResetPassword::where('token', '=', $token)->first();

        if(!empty($myToken)){

            $getToken = [
                'token' => $myToken->token
            ];
            
        } {

            if(isset($getToken)){
            
                return View::make('auth.passwords.users.reset')->with($getToken);
    
            }else{
    
                return redirect('/passw/reset')->with('unsuccessful', "Sorry, your token is invalid, expired or missing. Kindly reset again!");
    
            }


        }

        //return redirect('/passw/reset')->with('unsuccessful', "Sorry, your token is invalid, expired or missing. Kindly reset again!");

    }

    /**
     * Store new password & update tokens.
     * 
     * @author Jackson A. Chegenye
     * @return array
     */
    public function resetNow($token, VerificationCodeGenerator $getCode){

        $new_code = new VerificationCodeGenerator();
        $getCode = $new_code->generatePermissionsCode($getCode);

        $reset = Input::all();
        $rules = array(
            'email' => 'required|email|max:255',
            'g-recaptcha-response' => 'required',
            'password' => 'required|min:6|max:20|unique:users,password',
            'confirm_password' => 'required|same:password',
            'g-recaptcha-response' => 'required',
        );

        $validator = Validator::make ($reset, $rules);

        if ($validator -> passes()) {

            $request = ResetPassword::where('token','=', $token);

            if(isset($request)){

                $updatePassw = User::where('remember_token','=', $token )->first();
                $updatePassw->password  = Hash::make(Input::get('password'));
                $updatePassw->remember_token = Input::get('_token');
                $updatePassw->save();

                $updateRequest = ResetPassword::where('token','=', $token)->update(
                    [   
                        'token' => $getCode,
                    ]
                );

                return redirect('/login')->with('successful', "Your password has been reset!");

            }else{

                return redirect('/passw/reset')->with('unsuccessful', "Sorry, your token is invalid, expired or missing. Kindly reset again!");
            
            }

        } else {

            return redirect()->back()->withErrors($validator)->withInput();
        }

    }
    
    
}