<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $primaryKey = 'Id';

    protected $table = 'articles';

    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', Carbon::now());
    }

    public function scopeVisible($query)
    {
        return $query->where('is_hidden', 0);
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'article_tags', 'article_id', 'tag_id');
    }

    public function cates()
    {
        return $this->belongsToMany('App\Cate', 'article_cates', 'article_id', 'cate_id');
    }
}
