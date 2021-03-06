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

Route::get('/', 'HomeController@index');

Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function() {
	Route::get('/', 'HomeController@index');
	Route::resource('article', 'ArticleController');
	Route::resource('comment', 'CommentController');
});

Route::get('article/{id}', 'ArticleController@show');

Route::post('comment', 'CommentController@store');
