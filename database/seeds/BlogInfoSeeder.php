<?php

use Illuminate\Database\Seeder;

class BlogInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blog_info')->insert([
            'header_logo'           => 'assets/images/header-logo.jpg',
            'header_title'          => '折而不挠，终不为下',
            'header_subtitle'       => 'welcome to messikiller&apos;s home',
            'sidebar_motto'         => '一万年来谁著史，八千里外觅封侯',
            'sidebar_motto_sub'     => '—— 李鸿章',
            'sidebar_cates_size'    => 15,
            'sidebar_archives_size' => 8,
            'sidebar_tags_size'     => 30,
            'boxes_max_size'        => 5,
            'footer_weibo_url'      => 'http://weibo.com/5451465984/profile?rightmod=1'
                .'&wvr=6&mod=personinfo&is_all=1',
            'footer_github_url'     => 'https://github.com/messikiller',
            'footer_wechat_url'     => 'https://github.com/messikiller'
        ]);
    }
}
