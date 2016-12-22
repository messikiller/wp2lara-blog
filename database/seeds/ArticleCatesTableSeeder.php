<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ArticleCatesTableSeeder extends Seeder
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
        $cateIds    = DB::table('cates')->where('pid', '>', 0)->lists('Id');

        $data = array();
        foreach ($articleIds as $article_id)
        {
            $cate_num = mt_rand(2, 4);
            $cateKeys = array_rand($cateIds, $cate_num);
            foreach ($cateKeys as $cateKey)
            {
                $cate_id = $cateIds[$cateKey];

                $data[] = [
                    'article_id'  => $article_id,
                    'cate_id'     => $cate_id,
                    'created_at'  => $faker->dateTimeBetween('- 1 months', '+ 1 months'),
                    'updated_at'  => $faker->dateTimeBetween('- 1 months', '+ 1 months')
                ];
            }
        }

        DB::table('article_cates')->insert($data);
    }
}
