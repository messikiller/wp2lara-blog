<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Cate;
use App\Tag;
use App\Article;
use App\Blogroll;

class HomeController extends Controller
{

    public function __construct()
    {
        parent::__construct();

        view()->composer([
            'layouts.home_main'
        ], function ($view) {
            $view->with([
                'blogInfo'        => $this->blogInfo,
                'navbarCates'     => $this->getNavbarCates(),
                'sidebarTags'     => $this->getSidebarTags(),
                'sidebarCates'    => $this->getSidebarCates(),
                'sidebarArchives' => $this->getSidebarArchives(),
                'footerBlogrolls' => $this->getFooterBlogrolls()
            ]);
        });

    }

    /**
     * @access protected
     */
    protected function getBlogInfo($option = NULL, $default = NULL)
    {
        $blogInfo = $this->blogInfo;
        $default  = is_null($default) ? '' : $default;

        if (is_null($option)) {
            return $blogInfo;
        }

        if (is_string($option)) {
            return isset($blogInfo[$option]) ? $blogInfo[$option] : $default;
        }

        if (is_array($option)) {
            $ret = [];
            foreach ($option as $k => $v) {
                $ret[] = [
                    $k => isset($blogInfo[$k]) ? $blogInfo[$k] : $default
                ];
            }
            return $ret;
        }

        return '';
    }

    private function getNavbarCates()
    {
        $navbarCates = Cate::orderBy('order_num', 'asc')
            ->orderBy('created_at', 'asc')
            ->orderBy('Id', 'asc')
            ->get()
            ->toArray();

        return $this->_generateCatesMenu($navbarCates);
    }

    private function getSidebarTags()
    {
        $size = $this->getBlogInfo('sidebar_tags_size', 20);

        $sidebarTags = Tag::orderBy('created_at', 'asc')
            ->orderBy('Id', 'asc')
            ->take($size)
            ->get()
            ->toArray();

        return $sidebarTags;
    }

    private function getSidebarCates()
    {
        $size = $this->getBlogInfo('sidebar_cates_size', 20);

        $sidebarCates = Cate::withCount('articles')
            ->where('pid', '>', 0)
            ->orderBy('pid', 'asc')
            ->orderBy('created_at', 'asc')
            ->get()
            ->filter(function ($item) {
                return $item->articles_count > 0;
            })
            ->take($size)
            ->toArray();

        // dd($sidebarCates);

        return $sidebarCates;
    }

    private function getSidebarArchives()
    {
        $size = $this->getBlogInfo('sidebar_archives_size', 50);

        $sidebarArchives = Article::select(['Id', 'published_at'])
            ->orderBy('published_at', 'desc')
            ->published()
            ->visible()
            ->get()
            ->transform(function($item, $key) {
                $timestamp         = strtotime($item->published_at);
                $section_str       = date('Y-m', $timestamp);
                $section_timestamp = strtotime($section_str);

                $item->timestamp         = $timestamp;
                $item->archive_section   = $section_str;
                $item->section_timestamp = $section_timestamp;

                return $item;
            })
            ->groupBy('section_timestamp')
            ->take($size)
            ->toArray();

        // dd($sidebarArchives);

        return $sidebarArchives;
    }

    private function getFooterBlogrolls()
    {
        $footerBlogrolls = Blogroll::orderBy('created_at', 'asc')
            ->orderBy('Id', 'asc')
            ->get();

        return $footerBlogrolls;
    }

    private function _generateCatesMenu($cates)
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
