<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Bloginfo;

class BloginfoController extends AdminController
{
    public function index()
    {
        $bloginfo = Bloginfo::first();

        // dd($bloginfo->toArray());

        return view('admin/bloginfo_index')->with([
            'bloginfo' => $bloginfo
        ]);
    }
}
