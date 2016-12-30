<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;

use App\Article;
use App\Libraries\ZuiThreePresenter;

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
        $pagesize = $this->getBlogInfo('boxes_max_size', 5);

        $articles = Article::with(['tags', 'cates'])
            ->select(['Id', 'title', 'summary', 'is_hidden', 'read_num', 'published_at', 'created_at',  'updated_at'])
            ->published()
            ->visible()
            ->orderBy('published_at', 'desc')
            ->orderBy('Id', 'asc')
            ->paginate($pagesize);

        // dd($articles->links());

        return view('home.index')->with([
            'current_cate' => 0,
            'articles'     => $articles,
            'pagination'   => $articles->render(new ZuiThreePresenter($articles))
        ]);
    }

    public function view($id)
    {
        $article = Article::with(['tags', 'cates'])
            ->where('Id', '=', $id)
            ->firstOrFail();

        // dd($article->toArray());

        return view('home.view')->with([
            'current_cate' => 0,
            'article'      => $article
        ]);
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
