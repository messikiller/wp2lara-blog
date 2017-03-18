<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use  App\Libraries\Auth;

class Article extends Model
{
    protected $table = 'articles';

    protected $primaryKey = 'Id';

    private $auth;

    public function __construct()
    {
        parent::__construct();

        $this->auth = Auth::create();
    }

    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', Carbon::now());
    }

    public function scopeVisible($query)
    {
        return $query->where('is_hidden', 0);
    }

    public function scopeAuth($query)
    {
        if ($this->auth->isAuthed()) {
            return $query;
        } else {
            return $query->visible()->published();
        }
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
        return Self::where('published_at', '>', $pubtime)->auth()
            ->orderBy('published_at', 'asc')->first();
    }

    public function prev()
    {
        $pubtime = $this->published_at;
        return Self::where('published_at', '<', $pubtime)->auth()
            ->orderBy('published_at', 'desc')->first();
    }
}
