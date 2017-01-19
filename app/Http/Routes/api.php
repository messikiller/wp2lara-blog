<?php

$api = app('Dingo\Api\Routing\Router');

# v1
$api->version('v1', function ($api) {
    # test
    $api->get('hello', 'App\Api\Controllers\V1\FirstController@hello');
});

# v2
$api->version('v2', function ($api) {
    # test
    $api->get('hello', 'App\Api\Controllers\V1\FirstController@two');
});
