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
Route::get('/admin',       'AdminController@index');
Route::get('/admin/index', 'AdminController@index');
Route::get('/admin/login', 'AdminController@login');

Route::get('/admin/article',                 'Admin\ArticleController@index');
Route::get('/admin/article/create',          'Admin\ArticleController@create');
Route::post('/admin/article',                'Admin\ArticleController@store');
Route::get('/admin/article/{id}/edit',       'Admin\ArticleController@edit');
Route::post('/admin/article/{id}/edit',      'Admin\ArticleController@update');
Route::get('/admin/article/{$id}/act/{act}', 'Admin\ArticleController@act');

Route::get('/admin/blogroll',                'Admin\BlogrollController@index');
Route::get('/admin/blogroll/create',         'Admin\BlogrollController@create');
Route::post('/admin/blogroll',               'Admin\BlogrollController@store');
Route::get('/admin/blogroll/{id}/edit',      'Admin\BlogrollController@edit');
Route::post('/admin/blogroll/{id}',          'Admin\BlogrollController@update');
Route::get('/admin/blogroll/{id}/delete',    'Admin\BlogrollController@destroy');
Route::get('/admin/blogroll/{id}/act/{act}', 'Admin\BlogrollController@act');
