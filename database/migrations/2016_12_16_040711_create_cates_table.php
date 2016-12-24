<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cates', function (Blueprint $table) {
            $table->increments('Id');
            $table->integer('pid')->unsigned()->default(0);
            $table->string('name', 255);
            $table->string('color', 15)->default(0);
            $table->mediumInteger('order_num')->unsigned()->default(0);
            $table->integer('wp_term_id')->unsigned()->default(0);
            $table->integer('wp_parent_id')->unsigned()->default(0);
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
        Schema::drop('cates');
    }
}
