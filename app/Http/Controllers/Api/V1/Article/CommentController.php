<?php

namespace App\Http\Controllers\Api\V1\Article;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\ApiController;

use App\Article;
use App\Comment;

class CommentController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index($article_id)
    {
        $comments = Article::find($article_id)->comments()->get()->toArray();

        if (empty($comments)) {
            return $this->response(STATUS_EMPTY_SETS, 'Empty Sets');
        }

        $list = $this->format_comments($comments);
        return $this->response(STATUS_OK, $list);
    }

    public function add($article_id, Request $request)
    {
        //
    }

    private function format_comments($comments, $name = 'children', $pid = 0)
    {
        $ret = [];
        foreach ($comments as $comment)
        {
            if ($comment['parent_id'] == $pid) {
                $comment[$name] = $this->format_comments($comments, $name, $comment['Id']);
                $ret[] = $comment;
            }
        }

        return $ret;
    }

    public function json($article_id)
    {
        $article  = Article::find($article_id);
        $comments = $article->comments;

        $ret = [
            'title' => $article->title,
            'url'   => url('/view/'.$article->Id),
            'ttime' => strtotime($article->created_at) . '000',
            'sourceid' => $article->Id,
            'parentid' => 0,
            'categoryid' => '',
            'ownerid' => '',
            'metadata' => '',
            'comments' => []
        ];

        foreach ($comments as $comment) {
            $push = [
                'cmtid' => $comment->Id,
                'ctime' => strtotime($comment->created_at) . '000',
                'content' => $comment->content,
                'replyid' => $comment->parent_id,
                'user' => [
                    'userid' => 1,
                    'nickname' => $comment->author,
                    'usericon' => url('/assets/images/guest.png'),
                    'userurl' => $comment->url
                ],
                'ip' => long2ip($comment->ip),
                'useragent' => '',
                'channeltype' => '2',
                'from' => '',
                'spcount' => '',
                'opcount' => ''
            ];
            $ret['comments'][] = $push;
        }

        return json_encode($ret);
    }
}
