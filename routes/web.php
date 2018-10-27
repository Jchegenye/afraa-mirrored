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

Auth::routes();
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');

/*
|--------------------------------------------------------------------------
| Password reset links Routes
|--------------------------------------------------------------------------
*/

Route::get('passw/reset', array(
    'uses' => 'Auth\Users\ForgotPasswordController@showMyLinkRequestForm',
    'as' => 'passw.request'
));
Route::post('passw/reset', array(
    'uses' => 'Auth\Users\ForgotPasswordController@sendMyResetLinkEmail',
    'as' => 'passw.email'
));
Route::get('passw/reset/{token}', array(
    'uses' => 'Auth\Users\ForgotPasswordController@showMyResetForm',
    'as' => 'passw.reset'
));
Route::post('passw/update/{token}', array(
    'uses' => 'Auth\Users\ForgotPasswordController@resetNow',
));


// Route::post('password/reset', [
//     'us' => 'password.update',
//     'uses' => 'Auth\Users\ForgotPasswordController@myReset',
// ]);
// Route::get('password/reset/{token}', [
//     'us' => 'password.reset', 
//     'uses' => 'Auth\Users\ForgotPasswordController@showMyResetForm',
// ]);
// $this->get('admin/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// $this->post('admin/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// $this->get('admin/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// $this->post('admin/password/reset', 'Auth\ResetPasswordController@reset');
