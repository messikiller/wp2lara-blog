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
        return $this->ossClient->getUrl($ossKey, new \DateTime("+1 day"));
    }

    public function getFolderAllObjectKey($folder_name, $nextMarker = '', $bucketName = false)
    {
        if (! $bucketName)  $bucketName = $this->bucketName;
        return $this->ossClient->getAllObjectKeyWithPrefix($bucketName, $folder_name, $nextMarker);
    }

    public function getParentAllFolders($folder_name, $isRealPath = false, $bucketName = false)
    {
        if (! $bucketName)  $bucketName = $this->bucketName;
        $objects = $this->ossClient->getAllObjectKeyWithPrefix($bucketName, $folder_name, '');

        $prefix = rtrim($folder_name, '/');
        $ret = array();

        // $pattern = '/^'.str_replace('/', '\\/', $prefix).'\/(\w+\/)$/i';
        $pattern = '@^'.$prefix.'\/(\w+\/)$@i';

        foreach ($objects as $object)
        {
            if (preg_match($pattern, $object, $match)) {
                $ret[] = $isRealPath ? $object : $match[1];
            }
        }

        return $ret;
    }

    public function getAllObjectKey($bucketName = false)
    {
        if (! $bucketName)  $bucketName = $this->bucketName;
        return $this->ossClient->getAllObjectKey($bucketName);
    }

    public function getObjectMeta($osskey)
    {
        return $this->ossClient->getObjectMeta($bucketName, $osskey);
    }

}
