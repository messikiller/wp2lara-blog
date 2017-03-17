<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    protected $primaryKey = 'Id';

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

    public function comments()
    {
        return $this->hasMany('App\Comment', 'article_id', 'Id');
    }

    public function cate()
    {
        return $this->belongsTo('App\Cate', 'cate_id', 'Id');
    }

    public function next()
    {
        $pubtime = $this->published_at;
        return Self::where('published_at', '>', $pubtime)->first();
    }

    public function prev()
    {
        $pubtime = $this->published_at;
        return Self::where('published_at', '<', $pubtime)->first();
    }
}
