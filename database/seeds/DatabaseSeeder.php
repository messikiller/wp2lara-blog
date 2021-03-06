<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BlogInfoSeeder::class);
        $this->call(ArticlesTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(CatesTableSeeder::class);
        $this->call(ArticleTagsTableSeeder::class);
        $this->call(BlogrollsTableSeeder::class);
    }
}
