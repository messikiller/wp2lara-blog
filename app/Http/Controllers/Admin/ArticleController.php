<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;

use App\Libraries\ZuiThreePresenter;
use App\Libraries\Markdown;

use App\Article;
use App\Cate;
use App\Tag;

class ArticleController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with(['tags', 'cate'])
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
        $cates = Cate::where('pid', '>', 0)
            ->orderBy('created_at', 'desc')
            ->get();

        $tags = Tag::orderBy('created_at', 'desc')
            ->get();

        $article = Article::with(['tags', 'cate'])
            ->find($id);

        $markdown = Markdown::create();
        $article->summary = $markdown->htmlToMarkdown($article->summary);
        $article->content = $markdown->htmlToMarkdown($article->content);

        // dd($article->tags);

        return view('admin/article_edit')->with([
            'article' => $article,
            'cates'   => $cates,
            'tags'    => $tags
        ]);
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
