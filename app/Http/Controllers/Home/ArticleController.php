<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;

use Carbon\Carbon;

use App\Article;
use App\Cate;
use App\Tag;
use App\ArticleTag;
use App\Libraries\ZuiThreePresenter;
use App\Libraries\Util;

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

        $articles = Article::with(['tags', 'cate'])
            ->select(['Id', 'cate_id', 'title', 'summary', 'is_hidden', 'read_num', 'published_at', 'created_at',  'updated_at'])
            ->published()
            ->visible()
            ->orderBy('published_at', 'desc')
            ->orderBy('Id', 'asc')
            ->paginate($pagesize);

        // dd($articles->toArray());

        return view('home.index')->with([
            'current_cate' => 0,
            'articles'     => $articles,
            'pagination'   => $articles->render(new ZuiThreePresenter($articles))
        ]);
    }

    public function view($id)
    {
        $article = Article::with(['tags', 'cate'])
            ->where('Id', '=', $id)
            ->firstOrFail();

        $comments_api  = url('/api/article/'.$id.'/comments');
        $comments_json = file_get_contents($comments_api);
        $comments_arr  = json_decode($comments_json, true);
        $comments      = $comments_arr['errno'] == 0 ? $this->comments_wrap($comments_arr['data']) : '';

        // dd($comments);
        // dd($article->toArray());

        return view('home.view')->with([
            'current_cate' => 0,
            'article'      => $article,
            'comments'     => $comments
        ]);
    }

    public function tag($tag_id)
    {
        $pagesize = $this->getBlogInfo('boxes_max_size', 5);

        $articleIds = ArticleTag::where('tag_id', $tag_id)->lists('article_id')->unique()->toArray();
        $articles = Article::with(['tags', 'cate'])
            ->select(['Id', 'cate_id', 'title', 'summary', 'is_hidden', 'read_num', 'published_at', 'created_at',  'updated_at'])
            ->whereIn('Id', $articleIds)
            ->published()
            ->visible()
            ->orderBy('published_at', 'desc')
            ->orderBy('Id', 'asc')
            ->paginate($pagesize);

        // dd($articles->toArray());

        return view('home.index')->with([
            'current_cate' => 0,
            'articles'     => $articles,
            'pagination'   => $articles->render(new ZuiThreePresenter($articles))
        ]);
    }

    public function cate($cate_id)
    {
        $pagesize = $this->getBlogInfo('boxes_max_size', 5);

        $cate = Cate::where('Id', $cate_id)->first();
        $pid = $cate->pid;

        $current_cate = $pid > 0 ? $pid : $cate_id;

        if ($pid == 0) {
            $current_cate = $cate_id;
            $cateIds = Cate::where('pid', $cate_id)->lists('Id')->push($cate_id)->toArray();
            $articles = Article::with(['tags', 'cate'])
                ->select(['Id', 'cate_id', 'title', 'summary', 'is_hidden', 'read_num', 'published_at', 'created_at',  'updated_at'])
                ->whereIn('cate_id', $cateIds)
                ->published()
                ->visible()
                ->orderBy('published_at', 'desc')
                ->orderBy('Id', 'asc')
                ->paginate($pagesize);
        } else {
            $current_cate = $pid;
            $articles = Article::with(['tags', 'cate'])
                ->select(['Id', 'cate_id', 'title', 'summary', 'is_hidden', 'read_num', 'published_at', 'created_at',  'updated_at'])
                ->where('cate_id', $cate_id)
                ->published()
                ->visible()
                ->orderBy('published_at', 'desc')
                ->orderBy('Id', 'asc')
                ->paginate($pagesize);
        }

        // dd($articles->toArray());

        return view('home.index')->with([
            'current_cate' => $current_cate,
            'articles'     => $articles,
            'pagination'   => $articles->render(new ZuiThreePresenter($articles))
        ]);
    }

    public function archive($monthstamp)
    {
        $pagesize = $this->getBlogInfo('boxes_max_size', 5);

        $date = getdate($monthstamp);

        $min = date('Y-m-d H:i:s', $monthstamp);
        $max = Carbon::create($date['year'], $date['mon'], $date['mday'], 0, 0, 0)->addMonths(1)->toDateTimeString();

        $articles = Article::with(['tags', 'cate'])
            ->select(['Id', 'cate_id', 'title', 'summary', 'is_hidden', 'read_num', 'published_at', 'created_at',  'updated_at'])
            ->whereBetween('published_at', [$min, $max])
            ->published()
            ->visible()
            ->orderBy('published_at', 'desc')
            ->orderBy('Id', 'asc')
            ->paginate($pagesize);

        return view('home.index')->with([
            'current_cate' => 0,
            'articles'     => $articles,
            'pagination'   => $articles->render(new ZuiThreePresenter($articles))
        ]);
    }

    private function comments_wrap($comments)
    {
        $tpl = <<<EOF
<div class="comment">
    <a href="###" class="avatar"><i class="icon-camera-retro icon-2x"></i></a>
    <div class="content">
        <div class="pull-right text-muted">__CREATED_AT__</div>
        <div><span class="text-primary"><strong>__AUTHOR__</strong></span></div>
        <div class="text">__CONTENT__</div>
        <div class="actions"><a href="##">回复</a></div>
    </div>
    __CHILDREN__
</div>
EOF;

        foreach ($comments as $comment)
        {
            $comment['created_at'] = Util::create()->getPrettyDate(strtotime($comment['created_at']));

            $wrap = $tpl;
            $wrap = str_replace('__CREATED_AT__', $comment['created_at'], $wrap);
            $wrap = str_replace('__AUTHOR__',     $comment['author'],     $wrap);
            $wrap = str_replace('__CONTENT__',    $comment['content'],    $wrap);

            $children = '';
            if (! empty($comment['children'])) {
                $children = $this->comments_wrap($comment['children']);
                $children = '<div class="comments-list">'.$children.'</div>';
            }

            $wrap = str_replace('__CHILDREN__', $children, $wrap);
        }

        return $wrap;
    }
}
