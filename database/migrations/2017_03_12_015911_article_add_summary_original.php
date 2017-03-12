<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ArticleAddSummaryOriginal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasColumn('articles', 'summary_original')) {
            Schema::table('articles', function ($table) {
                $table->text('summary_original')->after('summary')->nullable()->default('');
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
        if (Schema::hasColumn('articles', 'summary_original')) {
            Schema::table('articles', function ($table) {
                $table->dropColumn('summary_original');
            });
        }
    }
}
