<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\BlogInfo;

use App\Libraries\Oss;

class BloginfoController extends AdminController
{
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
        // return view('admin/bloginfo_edit')->with([
        //     'bloginfo' => BlogInfo::first()
        // ]);

        dd(Oss::create()->setBucket('logs-access')->getAllObjectKey());
    }

    public function update()
    {

    }
}
