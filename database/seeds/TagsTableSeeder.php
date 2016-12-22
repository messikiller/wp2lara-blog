<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TagsTableSeeder extends Seeder
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
        foreach (range(1, 20) as $index) {
            $data[] = [
                'name' => $faker->unique()->word,
                'color' => $faker->hexcolor,
                'created_at'  => $faker->dateTimeBetween('- 1 months', '+ 1 months'),
                'updated_at'  => $faker->dateTimeBetween('- 1 months', '+ 1 months')
            ];
        }
        DB::table('tags')->insert($data);
    }
}
