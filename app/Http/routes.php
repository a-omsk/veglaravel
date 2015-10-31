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

Route::group(['prefix' => 'api'], function(){

Route::get('/', 'WelcomeController@index');

Route::get('login', 'HomeController@index');

/* Collections of locations, comments, users */

Route::get('map', 'LocationController@all');

Route::get('comments', 'CommentController@index');

Route::get('users', 'UserController@index');

/* Operations with locations */

Route::get('map/{city}', 'LocationController@getLocations');

Route::get('map/{city}/markers', 'LocationController@getMarkers');

Route::get('map/{city}/{id}', 'LocationController@getSpecLocation');

Route::post('map/', 'LocationController@store');

Route::put('map/{city}/{id}', 'LocationController@update');

Route::delete('map/{city}/{id}', 'LocationController@delete');

/* Operations with comments */

Route::get('locations/{city}/{id}/comments', 'CommentController@show');

Route::post('comments/post', 'CommentController@store');

Route::get('locations/{city}/{id}/comments/{comment_id}', 'CommentController@index');

Route::put('locations/{city}/{id}/comments/{comment_id}', 'CommentController@update');

Route::delete('locations/{city}/{id}/comments/{comment_id}', 'CommentController@delete');

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

Route::get('docs', function(){
    return View::make('docs.api.v1.index');
});

});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
