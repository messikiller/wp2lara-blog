<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;

use App\Article;

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
        $articles = Article::with(['tags', 'cates'])
            ->select(['Id', 'title', 'summary', 'is_hidden', 'read_num', 'published_at', 'created_at', 'updated_at'])
            ->published()
            ->visible()
            ->take(10)
            ->get()
            ->toArray();

        // dd($articles);

        return view('home.index')->with([
            'current_cate' => 0,
            'articles'     => $articles,
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
