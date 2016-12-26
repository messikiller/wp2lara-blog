<?php

namespace App\Libraries;

class ContentParser
{
    private static $instance;

    /**
     * @access private
     */
    private function __construct()
    {
        // singleton
    }

    /**
     * @access public
     */
    public function __clone()
    {
        trigger_error('Clone is not allow!', E_USER_ERROR);
    }

    public static function create()
    {
        if (! self::$instance instanceof self) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    private function _captureSummary($content)
    {
        return content;
    }
}
