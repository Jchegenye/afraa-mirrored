<?php

namespace Afraa\Http\Controllers\Auth;

use Afraa\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use Afraa\Settings;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard/delegate';
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        
        $customize = Settings::all();

        return view('auth.login', compact('customize'));
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function validateLogin(Request $request)
    {
        if (app()->environment('production')) {
            $this->validate($request, [
                $this->username() => 'required',
                'password' => 'required',

                // new rules here
                'g-recaptcha-response' => 'required|recaptcha',

            ]);
        }else{
            $this->validate($request, [
                $this->username() => '',
                'email'=> '',
                'password' => '',
                // new rules here
                'g-recaptcha-response' => '',

            ]);
        }
    }

    /**
     * Restricting User Access for Un-Verified Users
     * 
     * @author Jackson A. Chegenye
     * @param  array  $user
     * @return array $request
     */
    public function authenticated(Request $request, $user)
    {
    if (!$user->verified) {
        auth()->logout();
        return back()->with('warning', 'You need to confirm your account. We have sent you an activation code, please check your email.');
    }
    return redirect()->intended($this->redirectPath());
    }
    
}