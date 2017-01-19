<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    protected $primaryKey = 'Id';

    protected $table = 'cates';

    public function articles()
    {
        return $this->hasMany('App\Article', 'cate_id', 'Id');
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
