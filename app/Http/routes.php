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


// home pages routes

Route::group(['middleware' => 'web'], function () {
    Route::get('/',                              'Home\ArticleController@index');
    Route::get('/articles',                      'Home\ArticleController@index');
    Route::get('/articles/view/{id}',            'Home\ArticleController@view');
    Route::get('/articles/tag/{tag_id}',         'Home\ArticleController@tag');
    Route::get('/articles/cate/{cate_id}',       'Home\ArticleController@cate');
    Route::get('/articles/archive/{archive_id}', 'Home\ArticleController@archive');
    Route::auth();
});


// admin pages routes
Route::get('/admin',                      'AdminController@index');
Route::get('/admin/index',                'AdminController@index');
Route::get('/admin/login',                'AdminController@login');

Route::get('/admin/article/index',        'Admin\ArticleController@index');
Route::post('/admin/article/add',         'Admin\ArticleController@add');
Route::get('/admin/article/edit/{id}',    'Admin\ArticleController@edit');
Route::post('/admin/article/update/{id}', 'Admin\ArticleController@update');
Route::get('/admin/article/delete/{id}',  'Admin\ArticleController@delete');
