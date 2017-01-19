<?php

$api = app('Dingo\Api\Routing\Router');

/**
 * version v1
 */
$api->version('v1', function ($api) {
    $api->group([
        'namespace' => 'App\Http\Controllers\Api\V1'
    ], function($api) {
        $api->get('article/{article_id}/comments', 'Article\CommentController@_list');
    });
});
