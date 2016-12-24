<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_info', function (Blueprint $table) {
            $table->increments('Id');
            $table->string('header_logo', 255);
            $table->string('header_title', 255);
            $table->string('header_subtitle', 255);
            $table->string('sidebar_motto', 255);
            $table->string('sidebar_motto_sub', 255);
            $table->mediumInteger('sidebar_cates_size')->unsigned();
            $table->mediumInteger('sidebar_archives_size')->unsigned();
            $table->mediumInteger('sidebar_tags_size')->unsigned();
            $table->mediumInteger('boxes_max_size')->unsigned();
            $table->string('footer_weibo_url', 255);
            $table->string('footer_github_url', 255);
            $table->string('footer_wechat_url', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('blog_info');
    }
}
