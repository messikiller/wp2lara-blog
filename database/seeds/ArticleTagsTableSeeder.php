<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ArticleTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $articleIds = DB::table('articles')->lists('Id');

        $data = array();
        foreach ($articleIds as $article_id) {
            $tag_num = mt_rand(0, 3);
            if ($tag_num == 0) {
                continue;
            }

            $tag_id = mt_rand(3, 10);

            for ($i=1; $i <= $tag_num ; $i++) {
                $data[] = [
                    'article_id'  => $article_id,
                    'tag_id'      => $tag_id--,
                    'created_at'  => $faker->dateTimeBetween('- 1 months', '+ 1 months'),
                    'updated_at'  => $faker->dateTimeBetween('- 1 months', '+ 1 months')
                ];
            }
        }
        DB::table('article_tags')->insert($data);
    }
}
