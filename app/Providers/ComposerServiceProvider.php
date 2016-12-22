<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * 在容器内注册所有绑定。
     *
     * @return void
     */
    public function boot()
    {
        // 使用对象型态的视图组件...
        view()->composer(
            ['layouts.home_header', 'layouts.home_main'],
            'App\Http\ViewComposers\HomeHeaderComposer'
        );

        view()->composer(
            ['layouts.home_sidebar', 'layouts.home_main'],
            'App\Http\ViewComposers\HomeSidebarComposer'
        );

    }

    /**
     * 注册服务提供者。
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
