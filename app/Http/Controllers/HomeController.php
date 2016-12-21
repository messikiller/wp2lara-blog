<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Cate;
use App\Tag;

class HomeController extends Controller
{
    protected $navbarCates;
    protected $sidebrTags;

    public function __construct()
    {
        $navbarCates = Cate::orderBy('order_num', 'asc')
            ->orderBy('created_at', 'asc')
            ->orderBy('Id', 'asc')
            ->get()
            ->toArray();

        $this->navbarCates = $this->catesTree($navbarCates);

        $sidebarTags = Tag::orderBy('created_at', 'asc')
            ->orderBy('Id', 'asc')
            ->get()
            ->toArray();

        $this->sidebarTags = $sidebarTags;
    }

    private function catesTree($cates)
    {
        $ret = array();

        $func = function ($array, $field, $desc = false) {
            $fieldArr = array();
            foreach ($array as $k => $v) {
                $fieldArr[$k] = $v[$field];
            }
            $sort = $desc == false ? SORT_ASC : SORT_DESC;
            array_multisort($fieldArr, $sort, $array);
            return $array;
        };

        foreach ($cates as $key => $cate)
        {
            $Id  = $cate['Id'];
            $pid = $cate['pid'];
            $order_num = $cate['order_num'];
            if ($pid == 0) {
                $ret[$Id] = $cate;
            } else {
                $ret[$pid]['children'][] = $cate;
                call_user_func_array($func, array(&$ret[$pid]['children'], 'order_num', false));
            }
        }

        $ret = call_user_func_array($func, array(&$ret, 'order_num', false));
        return $ret;
    }
}
