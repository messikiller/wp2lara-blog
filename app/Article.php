<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function published()
    {
        return $this->where('published_at', '<=', Carbon::now());
    }

    public function tags()
    {
        return $this->hasMany('App\tag', 'Id', 'tag');
    }
}
