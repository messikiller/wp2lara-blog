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
        $comments = Article::find($article_id)->comments()->get();

        if (empty($comments)) {
            return $this->response(STATUS_EMPTY_SETS, $comments);
        }

        return $this->response(STATUS_OK, $comments);
    }

    public function add($article_id, Request $request)
    {
        //
    }
}
