<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('register', 'Auth\RegisterController@register');
    // Route::get('signup', [
    //     'uses' => 'Auth\RegisterController@showRegistrationForm'
    // ]);
    // Route::post('signup', [
    //     'as'    => 'register',
    //     'uses' => 'Auth\RegisterController@store'
    // ]);

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');


Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');

/*
|--------------------------------------------------------------------------
| Sign up / Login / Reset Password Routes
|--------------------------------------------------------------------------
*/
Route::group(['namespace' => 'Auth\Users'], function()
{
    
    // // | Sign up
    // Route::get('signup', [
    //     'uses' => 'RegistrationController@show'
    // ]);
    // Route::post('signup', [
    //     'as'    => 'register',
    //     'uses' => 'RegistrationController@store'
    // ]);
    // Route::get('/account/verify/{token}', [
	// 	'uses' => 'RegistrationController@verifyAccount'
	// ]);

    // // | Login
    // Route::get('login', [
    //     'uses' => 'LoginController@show'
    // ]);
    // Route::post('login', [
    //     'as' => 'login',
    //     'uses' => 'LoginController@login'
    // ]);
    // Route::post('logout', [
    //     'as' => 'logout',
    //     'uses' => 'LoginController@logout'
    // ]);


    // // | Reset Password
    // Route::get('reset-password', [
    //     'as'    => 'password.request',
    //     'uses' => 'PasswordResetController@show'
    // ]);
    // Route::get('password-update', [
    //     'as'    => 'password.update',
    //     'uses' => 'PasswordResetController@update'
    // ]);
    
    // | Others
    // Route::get('guest', function () {
    //     return view('auth.users.guest');
    // });
    // Route::get('verify', function () {
    //     return view('auth.users.verify');
    // });
    // Route::post('resend/{token}', [
    //     'as'    => 'verification.resend',
    //     'uses' => 'RegistrationController@verifyAccount'
    // ]);
    
});
