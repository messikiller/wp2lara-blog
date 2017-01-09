<?php

namespace App\Libraries;

use JohnLui\AliyunOSS\AliyunOSS;

class Oss
{
    private $ossClient;

    private $buckeName;

    private function __construct()
    {
        // singleton
    }

    public static function create($isInternal = false)
    {
        $serverAddress = $isInternal ? config('oss.ossServerInternal') : config('oss.ossServer');
        $defaultBucket = config('oss.defaultBucketName');

        $instance = new self();

        $instance->ossClient = AliyunOSS::boot(
            $serverAddress,
            config('oss.AccessKeyId'),
            config('oss.AccessKeySecret')
        );

        $instance->ossClient->setBucket($defaultBucket);
        $instance->bucketName = $defaultBucket;

        return $instance;
    }

    public function setBucket($bucketName)
    {
        $this->bucketName = $bucketName;
        $this->ossClient->setBucket($bucketName);

        return $this;
    }

    public function getObjectUrl($ossKey)
    {
        return $this->ossClient;
        // ->getUrl($ossKey, new \DateTime("+1 day"));
    }

    public function getAllObjectKey($bucketName = false)
    {
        if (! $bucketName)  $bucketName = $this->bucketName;
        return $this->ossClient->getAllObjectKey($bucketName);
    }

    public function getObjectMeta($osskey, $bucketName = false)
    {
        if (! $bucketName)  $bucketName = $this->bucketName;
        return $this->ossClient->getObjectMeta($bucketName, $osskey);
    }

}
