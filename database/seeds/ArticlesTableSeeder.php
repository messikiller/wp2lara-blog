<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $data = array();
        foreach (range(1, 30) as $index)
        {
            $data[] = [
                'title'        => $faker->unique()->realText(40, 3),
                'summary'      => $faker->realText(300, 3),
                'content'      => '<p>'. $faker->realText(500, 3) .'</p>',
                'is_hidden'    => mt_rand(0, 1),
                'read_num'     => mt_rand(10, 1000),
                'published_at' => $faker->dateTimeBetween('- 1 months', '+ 1 months'),
                'created_at'   => $faker->dateTimeBetween('- 1 months', '+ 1 months'),
                'updated_at'   => $faker->dateTimeBetween('- 1 months', '+ 1 months')
            ];
        }
        DB::table('articles')->insert($data);
    }
}
