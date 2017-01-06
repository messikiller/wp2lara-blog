<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Libraries\ZuiThreePresenter;
use App\Blogroll;

class BlogrollController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        $blogrolls = Blogroll::orderBy('created_at', 'asc')
            ->orderBy('Id', 'asc')
            ->paginate(15);
// dd($blogrolls);
        return view('admin/blogroll_index')->with([
            'blogrolls'  => $blogrolls,
            'pagination' => $blogrolls->render(new ZuiThreePresenter($blogrolls))
        ]);
    }

    public function add()
    {
        return view('admin/blogroll_add');
    }

    public function create()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function act()
    {

    }
}
