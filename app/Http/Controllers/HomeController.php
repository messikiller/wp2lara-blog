<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

use App\Cate;
use App\Tag;
use App\Article;
use App\Blogroll;

class HomeController extends Controller
{
    private $expire = 10;

    public function __construct()
    {
        parent::__construct();

        view()->composer([
            'layouts.home_main'
        ], function ($view) {
            $view->with([
                'blogInfo'        => $this->getBlogInfo(),
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
        if (Cache::has('home.navbarCates')) {
            return Cache::get('home.navbarCates');
        }

        $navbarCates = Cate::orderBy('order_num', 'asc')
            ->orderBy('created_at', 'asc')
            ->orderBy('Id', 'asc')
            ->get()
            ->toArray();
        $val = $this->_generateCatesMenu($navbarCates);
        Cache::put('home.navbarCates', $val, $this->expire);
        return $val;
    }

    private function getSidebarTags()
    {
        if (Cache::has('home.sidebarTags')) {
            return Cache::get('home.sidebarTags');
        }

        $size = $this->getBlogInfo('sidebar_tags_size', 20);

        $sidebarTags = Tag::orderBy('created_at', 'asc')
            ->orderBy('Id', 'asc')
            ->take($size)
            ->get()
            ->toArray();

        Cache::put('home.sidebarTags', $sidebarTags, $this->expire);
        return $sidebarTags;
    }

    private function getSidebarCates()
    {
        if (Cache::has('home.sidebarCates')) {
            return Cache::get('home.sidebarCates');
        }

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

        Cache::put('home.sidebarCates', $sidebarCates, $this->expire);
        return $sidebarCates;
    }

    private function getSidebarArchives()
    {
        if (Cache::has('home.sidebarArchives')) {
            return Cache::get('home.sidebarArchives');
        }

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

        Cache::put('home.sidebarArchives', $sidebarArchives, $this->expire);
        return $sidebarArchives;
    }

    private function getFooterBlogrolls()
    {
        if (Cache::has('home.footerBlogrolls')) {
            return Cache::get('home.footerBlogrolls');
        }

        $footerBlogrolls = Blogroll::orderBy('order_num', 'asc')
            ->orderBy('created_at', 'asc')
            ->orderBy('Id', 'asc')
            ->get();

        Cache::put('home.footerBlogrolls', $footerBlogrolls, $this->expire);
        return $footerBlogrolls;
    }

    private function _generateCatesMenu($cates)
    {
        $level1 = $level2 = [];

        foreach ($cates as $cate)
        {
            $Id  = intval($cate['Id']);
            $pid = intval($cate['pid']);

            if ($pid == 0) {
                $level1[$Id] = $cate;
                $level1[$Id]['children'] = [];
            } else {
                $level2[] = $cate;
            }
        }


        foreach ($level2 as $item)
        {
            $pid = intval($item['pid']);
            $level1[$pid]['children'][] = $item;

        }

        $level1 = collect($level1)->sortBy('order_num')->values()->toArray();

        foreach ($level1 as &$v)
        {
            $v['children'] = collect($v['children'])->sortBy('order_num')->values()->toArray();
        }

        return $level1;
    }
}
