<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('Id');
            $table->integer('article_id')->unsigned()->default(0);
            $table->integer('parent_id')->unsigned()->default(0);
            $table->string('author', 255)->default(0);
            $table->string('email', 255)->default(0);
            $table->string('url', 255)->default(0);
            $table->integer('ip')->unsigned()->default(0);
            $table->text('content');
            $table->tinyInteger('is_admin')->unsigned()->default(0);
            $table->tinyInteger('status')->unsigned()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comments');
    }
}
