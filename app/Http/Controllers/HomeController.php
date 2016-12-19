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

        // dd(collect($this->catesTree($cates)));
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
