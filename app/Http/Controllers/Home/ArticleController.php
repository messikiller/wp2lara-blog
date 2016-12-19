<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;

class ArticleController extends HomeController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.index')->with([
            'cates' => $this->cates,
            'current_cate' => 0
        ]);
    }

    public function view()
    {

    }

    public function tag()
    {

    }

    public function cate()
    {

    }

    public function archive()
    {

    }
}
