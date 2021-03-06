<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Auth::routes();

Route::group(['middleware' => 'auth'], function () {
	Route::get('/', 'HomeController@index');
	Route::get('/account','AccountController@index');

});

Route::resource('events', 'EventController');


Route::get('/login/redirect', 'Auth\SocialAuthController@redirect');
Route::get('/login/callback', 'Auth\SocialAuthController@callback');




	
