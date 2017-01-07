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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cates = Cate::where('pid', '>', 0)
            ->orderBy('created_at', 'desc')
            ->get();

        $tags = Tag::orderBy('created_at', 'desc')
            ->get();

        // dd($tags);
        return view('admin/article_create')->with([
            'cates' => $cates,
            'tags'  => $tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
}
