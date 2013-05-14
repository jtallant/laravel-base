<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

# Root
Route::get('/', array('uses' => 'PagesController@home', 'as' => 'root'));

# Auth
Route::get('login', array('uses' => 'PagesController@login', 'as' => 'login'));
Route::post('users/authenticate', 'UsersController@authenticate');
Route::get('users/logout', array('uses' => 'UsersController@logout', 'as' => 'logout'));

# Forgot Password
Route::get(
    'password/remind',
    array(
        'uses' => 'PagesController@forgotPassword',
        'as' => 'forgot-password'
    )
);

Route::post(
    'password/remind',
    array(
        'uses' => 'PagesController@postForgotPassword',
        'as' => 'send-password-reminder'
    )
);

Route::get(
    'password/reset/{token}',
    array(
        'uses' => 'PagesController@resetPassword',
        'as' => 'reset-password'
    )
);

Route::post(
    'password/reset/{token}',
    array('uses' => 'PagesController@postResetPassword')
);