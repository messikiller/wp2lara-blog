<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;

class HomeSidebarComposer
{
    /**
     * 将数据绑定到视图。
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with([
            'sidebarTags'     => $this->getSidebarTags(),
            'sidebarCates'    => $this->getSidebarCates(),
            'sidebarArchives' => $this->getSidebarArchives()
        ]);
    }

    private function getSidebarTags()
    {
        $sidebarTags = \App\Tag::orderBy('created_at', 'asc')
            ->orderBy('Id', 'asc')
            ->get()
            ->toArray();

        return $sidebarTags;
    }

    private function getSidebarCates()
    {
        $sidebarCates = \App\Cate::withCount('articles')
            ->where('pid', '>', 0)
            ->orderBy('pid', 'asc')
            ->orderBy('created_at', 'asc')
            ->get()
            ->toArray();

        return $sidebarCates;
    }

    private function getSidebarArchives()
    {
        $sidebarArchives = \App\Article::select(['Id', 'published_at'])
            ->orderBy('published_at', 'asc')
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
            ->take(12)
            ->toArray();

        // dd($sidebarArchives);

        return $sidebarArchives;
    }

}
