<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ArticleAddContentOriginal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasColumn('articles', 'content_original')) {
            Schema::table('articles', function ($table) {
                $table->text('content_original')->after('content')->nullable()->default('');
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
        if (Schema::hasColumn('articles', 'content_original')) {
            Schema::table('articles', function ($table) {
                $table->dropColumn('content_original');
            });
        }
    }
}
