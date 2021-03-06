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

Route::get('/', 'HomeController@index');
Route::post('/', 'HomeController@getRandomNote');
Route::post('/delete', 'HomeController@deleteArticle');


Route::resource('articles', 'ArticleController');
Route::resource('books', 'BookController');
Route::post('books/{books}/access-change', 'BookController@changeAccess');

Route::get('/search', '\App\Http\Controllers\SearchController@index');
Route::post('/search', '\App\Http\Controllers\SearchController@result');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
