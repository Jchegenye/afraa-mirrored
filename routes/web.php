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

/*
|--------------------------------------------------------------------------
| Sign up / Login / Reset Password Routes
|--------------------------------------------------------------------------
*/
Route::group(['namespace' => 'Auth\Users'], function()
{

    Route::get('emailtemplate', function () {
        return view('emails.test');
    });
    
    // | Sign up
    Route::get('signup', [
        'uses' => 'RegistrationController@show'
    ]);
    Route::post('signup', [
        'as'    => 'register',
        'uses' => 'RegistrationController@store'
    ]);
    Route::get('/account/verify/{token}', [
		'uses' => 'RegistrationController@verifyAccount'
	]);

    // | Login
    Route::get('login', [
        'uses' => 'LoginController@show'
    ]);
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('logout');


    // | Reset Password
    Route::get('reset-password', [
        'as'    => 'password.request',
        'uses' => 'PasswordResetController@show'
    ]);
    Route::get('password-update', [
        'as'    => 'password.update',
        'uses' => 'PasswordResetController@update'
    ]);
    
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
