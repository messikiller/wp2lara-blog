<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\BlogInfo;

class BloginfoController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $bloginfo = BlogInfo::first();

        // dd($bloginfo->toArray());

        return view('admin/bloginfo_index')->with([
            'bloginfo' => $bloginfo
        ]);
    }

    public function edit()
    {
        return view('admin/bloginfo_edit')->with([
            'bloginfo' => BlogInfo::first()
        ]);
    }

    public function update()
    {

    }
}
