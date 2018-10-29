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

Route::get('users/livesearch','Admin\Dashboard\ManageUsersController@liveSearch');

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'auth'], function()
{

    Route::get('/dashboard', [
        'uses' => 'HomeController@index',
        'middleware' => 'admin.role:admin'
    ]);
    Route::get('/lounge', [
        'uses' => 'HomeController@waitingLounge',
        'middleware' => 'lounge.role:lounge'
    ]);
    Route::get('/speaker', [
        'uses' => 'HomeController@waitingLounge',
        'middleware' => 'admin.role:admin'
    ]);

    Route::prefix('dashboard')->group(function () {
        Route::namespace('Admin\Dashboard')->group(function () {

            Route::get('/users', [
                'uses' => 'ManageUsersController@index',
                'middleware' => 'admin.permission:access_to_manage_users'
            ]);
            Route::get('/roles', [
                'uses' => 'ManageRolesController@index',
                'middleware' => 'admin.permission:access_to_manage_roles'
            ]);
            Route::get('/permissions', [
                'uses' => 'ManagePermissionsController@index',
                'middleware' => 'admin.permission:access_to_manage_permissions'
            ]);

        });
    });

});

Route::resource('programme', 'Programme\ProgrammeController');

Route::resource('notifications','Notifications\NotificationsController');

/*
|--------------------------------------------------------------------------
| Password reset links Routes
|--------------------------------------------------------------------------
*/
Route::namespace('Auth\Users')->group(function () {

    Route::get('passw/reset', array(
        'uses' => 'ForgotPasswordController@showMyLinkRequestForm',
        'as' => 'passw.request'
    ));
    Route::post('passw/reset', array(
        'uses' => 'ForgotPasswordController@sendMyResetLinkEmail',
        'as' => 'passw.email'
    ));
    Route::get('passw/reset/{token}', array(
        'uses' => 'ForgotPasswordController@showMyResetForm',
        'as' => 'passw.reset'
    ));
    Route::post('passw/update/{token}', array(
        'uses' => 'ForgotPasswordController@resetNow',
    ));

});

Auth::routes();
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
