<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

defined('STATUS_OK')                or define('STATUS_OK',              0);    //everything is fine
defined('STATUS_INVALID_ARGS')      or define('STATUS_INVALID_ARGS',    1);    //invalid arguments
defined('STATUS_NO_SESSION')        or define('STATUS_NO_SESSION',      2);    //no session
defined('STATUS_EMPTY_SETS')        or define('STATUS_EMPTY_SETS',      3);    //query empty sets
defined('STATUS_FAILED')            or define('STATUS_FAILED',          4);    //operation failed
defined('STATUS_DUPLICATE')         or define('STATUS_DUPLICATE',       5);    //operation duplicate
defined('STATUS_ACCESS_DENY')       or define('STATUS_ACCESS_DENY',     6);    //access deny (privileges not allow)
defined('STATUS_INVALID_SIGN')      or define('STATUS_INVALID_SIGN',    7);    //sign error
defined('STATUS_ACCESS_RESTRICT')   or define('STATUS_ACCESS_RESTRICT', 8);    //access restrict(runtime checking)

class ApiController extends Controller
{
    // use Helpers;

    public function __construct()
    {
        \Debugbar::disable();
    }

    protected function response($errno, $data, $ext=NULL)
    {
        $json = array(
            'errno'  => $errno,
            'data'   => $data
        );

        if ( $ext != NULL ) {
            $json['ext'] = $ext;
        }

        return json_encode($json);
    }
}
