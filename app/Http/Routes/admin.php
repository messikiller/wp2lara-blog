<?php
/*
|================================================================================
| admin pages routes part
|================================================================================
 */
Route::get('/admin',        'AdminController@index');
Route::get('/admin/index',  'AdminController@index');

Route::get('/login',        'AuthController@login');
Route::post('/check',       'AuthController@check');
Route::get('/logout',       'AuthController@logout');

Route::get('/admin/bloginfo',           'Admin\BloginfoController@index');
Route::get('/admin/bloginfo/edit',      'Admin\BloginfoController@edit');
Route::post('/admin/bloginfo/update',   'Admin\BloginfoController@update');
Route::get('/admin/bloginfo/password',  'Admin\BloginfoController@resetPassword');
Route::post('/admin/bloginfo/password', 'Admin\BloginfoController@updatePassword');

Route::get('/admin/article',                 'Admin\ArticleController@index');
Route::get('/admin/article/create',          'Admin\ArticleController@create');
Route::post('/admin/article',                'Admin\ArticleController@store');
Route::get('/admin/article/{id}/edit',       'Admin\ArticleController@edit');
Route::post('/admin/article/{id}/edit',      'Admin\ArticleController@update');
Route::get('/admin/article/{id}/act/{act}',  'Admin\ArticleController@act');

Route::get('/admin/cate',                'Admin\CateController@index');
Route::get('/admin/cate/create',         'Admin\CateController@create');
Route::post('/admin/cate',               'Admin\CateController@store');
Route::get('/admin/cate/{id}/edit',      'Admin\CateController@edit');
Route::post('/admin/cate/{id}',          'Admin\CateController@update');
Route::get('/admin/cate/{id}/delete',    'Admin\CateController@destroy');
Route::get('/admin/cate/{id}/act/{act}', 'Admin\CateController@act');

Route::get('/admin/tag',                'Admin\TagController@index');
Route::get('/admin/tag/create',         'Admin\TagController@create');
Route::post('/admin/tag',               'Admin\TagController@store');
Route::get('/admin/tag/{id}/edit',      'Admin\TagController@edit');
Route::post('/admin/tag/{id}',          'Admin\TagController@update');
Route::get('/admin/tag/{id}/delete',    'Admin\TagController@destroy');
Route::get('/admin/tag/{id}/act/{act}', 'Admin\TagController@act');

Route::get('/admin/blogroll',                'Admin\BlogrollController@index');
Route::get('/admin/blogroll/create',         'Admin\BlogrollController@create');
Route::post('/admin/blogroll',               'Admin\BlogrollController@store');
Route::get('/admin/blogroll/{id}/edit',      'Admin\BlogrollController@edit');
Route::post('/admin/blogroll/{id}',          'Admin\BlogrollController@update');
Route::get('/admin/blogroll/{id}/delete',    'Admin\BlogrollController@destroy');
Route::get('/admin/blogroll/{id}/act/{act}', 'Admin\BlogrollController@act');
