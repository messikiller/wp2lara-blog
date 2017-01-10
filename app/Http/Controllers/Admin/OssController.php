<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Libraries\Oss;

class OssController extends AdminController
{
    public function index()
    {
        dd(Oss::create()->getParentAllFolders('wp-content/uploads/2014/'));
    }
}
