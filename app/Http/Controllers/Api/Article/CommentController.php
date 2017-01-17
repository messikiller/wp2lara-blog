<?php

namespace App\Http\Controllers\Api\Article;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\ApiController;

class CommentController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function list($article_id)
    {
        //
    }

    public function add($article_id, Request $request)
    {
        //
    }
}
