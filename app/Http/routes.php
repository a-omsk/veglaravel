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


Route::get('/', 'WelcomeController@index');

Route::get('login', 'HomeController@index');

Route::get('locations/{city}', 'LocationController@index');

Route::get('locations/{city}/{id}', 'LocationController@show');

Route::get('coordinates/get' ,'LocationController@get');

Route::post('locations/post', 'LocationController@store');

Route::get('comments', 'CommentsController@index');

Route::get('locations/{city}/{id}/comments', 'CommentsController@show');

Route::post('comments/post', 'CommentsController@store');

Route::resource('authenticate', 'AuthenticateController');
    
Route::post('authenticate', 'AuthenticateController@authenticate');

Route::post('/signin', function () {
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
