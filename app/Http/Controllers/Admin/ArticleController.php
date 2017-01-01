<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;

class ArticleController extends AdminController
{
    public function __construct()
    {
        \Debugbar::enable();
        // $this->middleware('auth');
    }

    public function index()
    {
        return view('admin/article_index');
    }

    public function add()
    {
        //
    }

    public function edit()
    {
        //
    }

    public function delete()
    {
        //
    }
}
