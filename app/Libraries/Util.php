<?php

namespace App\Libraries;

class Util
{
    private static $instance;

    public static function create()
    {
        if (! self::$instance instanceof self) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getPrettyDate($timestamp)
    {
        $ctime  = time();
        $suffix = ($timestamp > $ctime) ? '后' : '前';
        $delta  = abs($timestamp - $ctime);

        $ret = date('Y-m-d', $timestamp);

        if ($delta > 0 && $delta < 7*24*3600) {
            $_day = ceil($delta / (24*3600));
            $ret = $_day .'天'. $suffix;
        } elseif ($delta >= 7*24*3600 && $delta < 5*7*24*3600) {
            $_week = ceil($delta / (7*24*3600));
            $ret = $_week .'周'. $suffix;
        } elseif ($delta >= 5*7*24*3600 && $delta < 15*7*24*3600) {
            $m1 = intval(date('m', $ctime));
            $m2 = intval(date('m', $timestamp));

            $_m = ($m1 < $m2) ? (12 + $m1 - $m2) : ($m1 - $m2);
            $ret = $_m .'个月'. $suffix;
        }

        return $ret;
    }
}
