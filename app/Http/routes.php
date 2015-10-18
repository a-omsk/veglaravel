<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*  Basic routing */

Route::get('/', 'WelcomeController@index');

Route::get('login', 'HomeController@index');

/* Collections of locations, comments, users */

Route::get('locations', 'LocationController@all');

Route::get('comments', 'CommentsController@index');

Route::get('users', 'UserController@index');

/* Operations with locations */

Route::get('locations/{city}', 'LocationController@index');

Route::post('locations/post', 'LocationController@store');

Route::get('locations/{city}/{id}', 'LocationController@show');

Route::put('locations/{city}/{id}', 'LocationController@update');

Route::delete('locations/{city}/{id}', 'LocationController@delete');

/* Operations with comments */

Route::get('locations/{city}/{id}/comments', 'CommentsController@show');

Route::post('comments/post', 'CommentsController@store');

Route::get('locations/{city}/{id}/comments/{comment_id}', 'CommentsController@index');

Route::put('locations/{city}/{id}/comments/{comment_id}', 'CommentsController@update');

Route::delete('locations/{city}/{id}/comments/{comment_id}', 'CommentsController@delete');

/* Operations with users */

Route::get('users/{id}', 'UserController@show');

Route::put('users/{id}', 'UserController@update');

Route::delete('users/{id}', 'UserController@destroy');

/* Locations & comments added by user */

Route::get('users/{id}/locations', 'UserController@locations');

Route::get('users/{id}/comments', 'UserController@comments');

/* Auth functions */

Route::get('authenticate/user', 'AuthenticateController@getAuthenticatedUser');

Route::post('/authenticate', function () {
   $credentials = Input::only('email', 'password');

   if ( ! $token = JWTAuth::attempt($credentials)) {
       return Response::json(false, HttpResponse::HTTP_UNAUTHORIZED);
   }

   return Response::json(compact('token'));
});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);