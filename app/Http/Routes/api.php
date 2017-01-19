<?php

$api = app('Dingo\Api\Routing\Router');

/**
 * version v1
 */
$api->version('v1', function ($api) {
    $api->get('article/{article_id}/comments', 'App\Http\Controllers\Api\V1\Article\CommentController@index');
});

/**
 * version v2
 */
$api->version('v2', function ($api) {
    $api->get('article/{article_id}/comments', 'App\Http\Controllers\Api\V1\Article\CommentController@add');
});
