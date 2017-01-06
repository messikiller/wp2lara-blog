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

Route::get('/admin/article/index',             'Admin\ArticleController@index');
Route::get('/admin/article/add',               'Admin\ArticleController@add');
Route::post('/admin/article/add',              'Admin\ArticleController@create');
Route::get('/admin/article/edit/{id}',         'Admin\ArticleController@edit');
Route::post('/admin/article/edit/{id}',        'Admin\ArticleController@update');
Route::get('/admin/article/act/{act}/Id/{id}', 'Admin\ArticleController@act');

Route::get('/admin/blogroll/index',             'Admin\BlogrollController@index');
Route::get('/admin/blogroll/add',               'Admin\BlogrollController@add');
Route::post('/admin/blogroll/add',              'Admin\BlogrollController@create');
Route::get('/admin/blogroll/edit/{id}',         'Admin\BlogrollController@edit');
Route::post('/admin/blogroll/edit/{id}',        'Admin\BlogrollController@update');
Route::get('/admin/blogroll/act/{act}/Id/{id}', 'Admin\BlogrollController@act');
