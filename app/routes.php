<?php

//Event::listen('Larabook.Registration.Events.UserRegistered', function($event)
//{
//    dd('send notification email');
//});

Route::get('/', [
    'as' => 'home',
    'uses' => 'PagesController@home'
]);

/*
 * Registration
 */

Route::get('register', [
    'as' => 'register_path',
    'uses' => 'RegistrationController@create'
]);

Route::post('register', [
    'as' => 'register_path',
    'uses' => 'RegistrationController@store'
]);

Route::get('login',[
    'as' => 'login_path',
    'uses' => 'SessionsController@create'

]);

Route::post('login',[
    'as' => 'login_path',
    'uses' => 'SessionsController@store'

]);

Route::get('logout',[
    'as' => 'logout_path',
    'uses' => 'SessionsController@destroy'
]);


/*
 * Statuses
 */

Route::get('statuses','StatusController@index');