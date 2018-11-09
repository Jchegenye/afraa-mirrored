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
    return view('auth.login');
});

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'auth'], function()
{

    Route::prefix('dashboard/')->group(function () {

        //Admin Dashboard - Main Landing Pages
        Route::get('/delegate', [
            'uses' => 'Delegate\DelegateController@index',
            'middleware' => 'delegate.role:delegate'
        ]);
        Route::get('/manager', [
            'uses' => 'Manager\ManagerController@index',
            'middleware' => 'manager.role:manager'
        ]);
        Route::get('/exibitor', [
            'uses' => 'Exibitor\ExibitorController@index',
            'middleware' => 'exibitor.role:exibitor'
        ]);
        Route::get('/speaker', [
            'uses' => 'Speaker\SpeakerController@index',
            'middleware' => 'speaker.role:speaker'
        ]);
        Route::get('/author', [
            'uses' => 'Author\AuthorController@index',
            'middleware' => 'author.role:author'
        ]);
        Route::get('/admin', [
            'uses' => 'Admin\AdminController@index',
            'middleware' => 'admin.role:admin'
        ]);

        //Admin Dashboard - Internal Pages
        Route::namespace('Admin\Dashboard')->group(function () {

            Route::get('/users', [
                'uses' => 'ManageUsersController@index',
                'middleware' => 'permission:access_to_manage_users'
            ]);
            Route::get('/roles', [
                'uses' => 'ManageRolesController@index',
                'middleware' => 'permission:access_to_manage_roles'
            ]);
            Route::get('/permissions', [
                'uses' => 'ManagePermissionsController@index',
                'middleware' => 'permission:access_to_manage_permissions'
            ]);

        });

        //Delegate Dashboard - Internal Pages
        Route::namespace('Delegate')->group(function () {

            Route::get('/delegates/programe', [
                'uses' => 'DelegateController@viewPrograme',
                'middleware' => 'permission:access_to_view_programmes'
            ]);

        });

        //Exibitor Dashboard - Internal Pages

        //Speaker Dashboard - Internal Pages

        //Manager Dashboard - Internal Pages

        //Author Dashboard - Internal Pages

    });

    Route::get('users/livesearch','Admin\Dashboard\ManageUsersController@liveSearch');

});


Route::group(['middleware' => 'auth'], function()
{
    Route::prefix('dashboard/admin')->group(function () {

        Route::resource('notifications','Notifications\NotificationsController')->middleware('admin.permission:access_to_manage_roles');

        Route::resource('session','ProgrammeSession\ProgrammeSessionController')->middleware('admin.permission:access_to_manage_roles');

        Route::resource('featured_session','FeaturedSessionController')->middleware('admin.permission:access_to_manage_roles');

    });

    Route::prefix('dashboard/delegate')->group(function () {

        Route::resource('programme', 'Programme\ProgrammeController');

        Route::resource('notifications','Notifications\NotificationsController');

        Route::resource('session','ProgrammeSession\ProgrammeSessionController');

        Route::resource('speakers','Speaker\SpeakerController');

    });

});

// Route::resource('programme', 'Programme\ProgrammeController');

// Route::resource('notifications','Notifications\NotificationsController');

// Route::resource('session','ProgrammeSession\ProgrammeSessionController');

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
