<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;

use App\Libraries\ZuiThreePresenter;
use App\Article;
use App\Cate;
use App\Tag;

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
        $cates = Cate::where('pid', '>', 0)
            ->orderBy('created_at', 'desc')
            ->get();

        $tags = Tag::orderBy('created_at', 'desc')
            ->get();

        // dd($tags);
        return view('admin/article_add')->with([
            'cates' => $cates,
            'tags'  => $tags
        ]);
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
