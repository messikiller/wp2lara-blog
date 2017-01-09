<?php

return [
    'ossServer'         => env('ALIOSS_SERVER'), //青岛为 http://oss-cn-qingdao.aliyuncs.com
    'ossServerInternal' => env('ALIOSS_SERVER_INTERNAL'), //青岛为 http://oss-cn-qingdao-internal.aliyuncs.com
    'AccessKeyId'       => env('ALIOSS_ACCESS_KEY_ID'),
    'AccessKeySecret'   => env('ALIOSS_ACCESS_KEY_SECRECT'),
    'defaultBucketName' => env('ALIOSS_DEFAULT_BUCKETNAME'),
];
