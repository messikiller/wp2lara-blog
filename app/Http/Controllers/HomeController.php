<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Cate;

class HomeController extends Controller
{
    public function __construct()
    {
        $cates = Cate::orderBy('order_num', 'asc')
            ->orderBy('created_at', 'asc')
            ->orderBy('Id', 'asc')
            ->get()
            ->toArray();

dd($cates->toArray());
        // $cates = $cates->each($func = function ($item, $key) use (&$func) {
        //     if ($item->id > 0) {
        //
        //     }
        // });
        // array_walk($cates, $func = function($item) use (&$func) {
        //     if ($item['pid'] > 0) {
        //         $pid = $item['pid'];
        //         $cates
        //         return array_merge($item, $func())
        //     }
        //     return $item
        // });
        // $tree
    }
}
