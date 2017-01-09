<?php

namespace App\Libraries;

class Util
{
    public static function getPrettyDatetime($timstamp)
    {
        $ctime  = time();
        $suffix = ($timstamp > $ctime) ? '后' : '前';
        $delta  = abs($timestamp - $ctime);
    }
}
