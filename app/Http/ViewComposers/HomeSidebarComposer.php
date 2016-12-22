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
        return;
    }

}
