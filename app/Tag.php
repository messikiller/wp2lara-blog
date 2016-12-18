<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $primaryKey = 'Id';

    protected $table = 'tags';

    // public function articles()
    // {
    //     return $this->belongsToMany('App\Tag', 'article_tags', 'tag_id', 'article_id');
    // }
}
