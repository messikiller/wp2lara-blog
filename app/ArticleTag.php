<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleTag extends Model
{
    protected $table      = 'article_tags';
    protected $primaryKey = 'Id';

    protected $fillable = ['article_id', 'tag_id'];
}
