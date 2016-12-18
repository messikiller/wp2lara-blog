<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    protected $primaryKey = 'Id';

    public function articles()
    {
        return $this->belongsToMany('App\Article', 'article_cates', 'cate_id', 'article_id');
    }

    public function parentCates()
    {
        return $this->belongsToMany($this, 'cates', 'Id', 'pid');
    }

    public function childrenCates()
    {
        return $this->belongsToMany($this, 'cates', 'pid', 'Id');
    }
}
