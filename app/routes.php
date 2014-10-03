<?php

//Event::listen('Larabook.Registration.Events.UserRegistered', function()
//{
//    dd('send notification email');
//});

use Larabook\Roles\Role;
use Larabook\Users\User;

Route::get('/', [
    'as' => 'home',
    'uses' => 'PagesController@home'
]);

/**
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

Route::get('googlelogin', function()
{
    //$provider->authorize();
});

Route::post('login',[
    'as' => 'login_path',
    'uses' => 'SessionsController@store'
]);

/**
 * OAuth2 Google Login Routes
 */
Route::get('authorize', 'HomeController@authorize');

Route::get('google/login', 'HomeController@login');

Route::get('logout',[
    'as' => 'logout_path',
    'uses' => 'SessionsController@destroy'
]);


/**
 * Statuses
 */

Route::get('statuses',[
    'as' => 'statuses_path',
    'uses' => 'StatusesController@index'
]);

Route::post('statuses',[
    'as' => 'statuses_path',
    'uses' => 'StatusesController@store'
]);

Route::post('statuses/{id}/comments', [
    'as' => 'comment_path',
    'uses' => 'CommentsController@store'
]);

/**
 * Users
 */

Route::get('users', [
    'as' => 'users_path',
    'uses' => 'UsersController@index'
]);

Route::get('@{username}',[
    'as' => 'profile_path',
    'uses' => 'UsersController@show'
]);

/**
 * Roles lesson
 * https://laracasts.com/lessons/users-and-roles
 */

//Route::get('roles', function()
//{
//   // User::first()->roles()->attach(1);
//    return User::first()->roles;
//});

/**
 * Follows
 */

Route::post('follows',[
    'as' => 'follows_path',
    'uses' => 'FollowsController@store'
]);

Route::delete('follows/{id}', [
    'as' => 'follow_path',
    'uses' => 'FollowsController@destroy'
]);
/**
 * Password resets
 */
Route::controller('password', 'RemindersController');
