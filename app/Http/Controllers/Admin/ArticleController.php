<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;

use App\Libraries\ZuiThreePresenter;
use App\Libraries\Markdown;
use DB;

use App\Article;
use App\Cate;
use App\Tag;
use App\ArticleTag;

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
        $this->validate($request, [
            'article.title'        => 'required|max:255',
            'article.cate'         => 'required|integer|min:1',
            'article.tag'          => 'required|array',
            'article.published_at' => 'required|date',
            'article.summary'      => 'required|max:500',
            'article.content'      => 'required'
        ]);

        $article  = new Article();
        $markdown = Markdown::create();

        $article->title        = $request->input('article.title');
        $article->cate_id      = $request->input('article.cate');
        $article->published_at = $request->input('article.published_at');
        $article->summary      = $markdown->markdownToHtml($request->input('article.summary'));
        $article->content      = $markdown->markdownToHtml($request->input('article.content'));

        $res1 = $article->save();

        $tags = $request->input('article.tag');

        $article_id = $article->Id;
        $toSaveTags = [];
        foreach ($tags as $tag) {
            $toSaveTags[] = [
                'article_id' => $article_id,
                'tag_id'     => $tag
            ];
        }

        $res2 = DB::table('article_tags')->insert($toSaveTags);

        if ($res1 && $res2) {
            return redirect('admin/article');
        } else {
            return back();
        }

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
        $this->validate($request, [
            'article.title'        => 'required|max:255',
            'article.cate'         => 'required|integer|min:1',
            'article.published_at' => 'required|date',
            'article.tag'          => 'required|array',
            'article.summary'      => 'required|max:500',
            'article.content'      => 'required'
        ]);

        $article  = Article::find($id);
        $markdown = Markdown::create();

        $article->title        = $request->input('article.title');
        $article->cate_id      = $request->input('article.cate');
        $article->published_at = $request->input('article.published_at');
        $article->summary      = $markdown->markdownToHtml($request->input('article.summary'));
        $article->content      = $markdown->markdownToHtml($request->input('article.content'));

        $tags = $request->input('article.tag');
        $toSaveTags = [];
        foreach ($tags as $tag) {
            $toSaveTags[] = [
                'article_id' => $id,
                'tag_id'     => $tag
            ];
        }

        $res1 = $article->save();
        $res2 = ArticleTag::where('article_id', '=', $id)->delete();
        $res3 = DB::table('article_tags')->insert($toSaveTags);

        if ($res1 && $res2 && $res3) {
            return redirect('admin/article');
        } else {
            return back();
        }

    }
}
