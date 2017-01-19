<?php
/*
|================================================================================
| home pages routes part
|================================================================================
 */
Route::group(['middleware' => 'web'], function () {
    Route::get('/',                     'Home\ArticleController@index');
    Route::get('/view/{id}',            'Home\ArticleController@view');
    Route::get('/tag/{tag_id}',         'Home\ArticleController@tag');
    Route::get('/cate/{cate_id}',       'Home\ArticleController@cate');
    Route::get('/archive/{monthstamp}', 'Home\ArticleController@archive');
});
