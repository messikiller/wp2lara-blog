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
        $navbarCatesKey = config('cache_keys.HomeNavabarCates');

        if (Cache::has($navbarCatesKey)) {
            return Cache::get($navbarCatesKey);
        }

        $navbarCates = Cate::orderBy('order_num', 'asc')
            ->orderBy('created_at', 'asc')
            ->orderBy('Id', 'asc')
            ->get()
            ->toArray();
        $val = $this->_generateCatesMenu($navbarCates);
        Cache::put($navbarCatesKey, $val, $this->expire);
        return $val;
    }

    private function getSidebarTags()
    {
        $sidebarTagsKey = config('cache_keys.HomeSidebarTags');

        if (Cache::has($sidebarTagsKey)) {
            return Cache::get($sidebarTagsKey);
        }

        $size = $this->getBlogInfo('sidebar_tags_size', 20);

        $sidebarTags = Tag::orderBy('created_at', 'asc')
            ->orderBy('Id', 'asc')
            ->take($size)
            ->get()
            ->toArray();

        Cache::put($sidebarTagsKey, $sidebarTags, $this->expire);
        return $sidebarTags;
    }

    private function getSidebarCates()
    {
        $sidebarCatesKey = config('cache_keys.HomeSidebarCates');

        if (Cache::has($sidebarCatesKey)) {
            return Cache::get($sidebarCatesKey);
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

        Cache::put($sidebarCatesKey, $sidebarCates, $this->expire);
        return $sidebarCates;
    }

    private function getSidebarArchives()
    {
        $sidebarArchivesKey = config('cache_keys.HomeSidebarArchives');

        if (Cache::has($sidebarArchivesKey)) {
            return Cache::get($sidebarArchivesKey);
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

        Cache::put($sidebarArchivesKey, $sidebarArchives, $this->expire);
        return $sidebarArchives;
    }

    private function getFooterBlogrolls()
    {
        $footerBlogrollsKey = config('cache_keys.HomeFooterBlogrolls');

        if (Cache::has($footerBlogrollsKey)) {
            return Cache::get($footerBlogrollsKey);
        }

        $footerBlogrolls = Blogroll::orderBy('order_num', 'asc')
            ->orderBy('created_at', 'asc')
            ->orderBy('Id', 'asc')
            ->get();

        Cache::put($footerBlogrollsKey, $footerBlogrolls, $this->expire);
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
