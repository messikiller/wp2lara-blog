<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;

use App\Libraries\ZuiThreePresenter;
use App\Article;

class ArticleController extends AdminController
{
    public function __construct()
    {
        \Debugbar::enable();
        // $this->middleware('auth');
    }

    public function index()
    {
        $articles = Article::with(['tags', 'cates'])
            ->orderBy('published_at', 'desc')
            ->paginate(15);

        // dd($articles->toArray());

        return view('admin/article_index')->with([
            'articles'   => $articles,
            'pagination' => $articles->render(new ZuiThreePresenter($articles))
        ]);
    }

    public function add()
    {
        return view('admin/article_add');
    }

    public function create(Request $request)
    {
        //
    }

    public function edit($id)
    {
        echo $id;
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function act($act, $id)
    {
        //
    }
}
