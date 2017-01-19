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

    public function _list($article_id)
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
}
