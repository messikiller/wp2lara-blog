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

// home pages routes
Route::get('/',                     'Home\ArticleController@index');
Route::get('/view/{id}',            'Home\HomeController@view');
Route::get('/tag/{tag_id}',         'Home\HomeController@tag');
Route::get('/cate/{cate_id}',       'Home\ArticleController@cate');
Route::get('/archive/{archive_id}', 'Home\HomeController@archive');

// admin pages routes
Route::get('/admin/articles',             'Admin\ArticleController@index');
Route::post('/admin/article/store',       'Admin\ArticleController@store');
Route::get('/admin/article/edit/{id}',    'Admin\ArticleController@edit');
Route::post('/admin/article/update/{id}', 'Admin\ArticleController@update');
Route::get('/admin/article/delete/{id}',  'Admin\ArticleController@destroy');
