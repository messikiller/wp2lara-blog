<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBlogrollOrderNum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasColumn('blogrolls', 'order_num')) {
            Schema::table('blogrolls', function ($table) {
                $table->integer('order_num')->unsigned()->after('link')->default(0);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('blogrolls', 'order_num')) {
            Schema::table('blogrolls', function ($table) {
                $table->dropColumn('order_num');
            });
        }
    }
}
