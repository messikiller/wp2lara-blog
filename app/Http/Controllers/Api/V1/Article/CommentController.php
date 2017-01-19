<?php

namespace App\Http\Controllers\Api\V1\Article;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\ApiController;

class CommentController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index($article_id)
    {
        return array('v1' => $article_id);
    }

    public function add($article_id, Request $request)
    {
        return array('v2' => $article_id);
    }
}
