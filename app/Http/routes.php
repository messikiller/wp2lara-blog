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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::auth();

// front pages
Route::get('/', 'HomeController@index');
Route::get('/view/{id}', 'HomeController@view');

// admin pages routes
Route::get('/admin/articles',             'admin\ArticleController@index');
Route::post('/admin/article/store',       'admin\ArticleController@store');
Route::get('/admin/article/edit/{id}',    'admin\ArticleController@edit');
Route::post('/admin/article/update/{id}', 'admin\ArticleController@update');
Route::get('/admin/article/delete/{id}',  'admin\ArticleController@destroy');
