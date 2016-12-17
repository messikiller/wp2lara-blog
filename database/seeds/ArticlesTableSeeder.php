<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array();
        foreach (range(1, 200) as $index) {
            $data[] = [
                'title' => str_random(mt_rand(10, 255)),
                'summary' => str_random(mt_rand(10, 1000)),
                'content' => str_random(mt_rand(10, 10000)),
                'is_hidden' => mt_rand(0, 1),
                'created_at'  => date('Y-m-d H:i:s', time() - mt_rand(3600, 30*24*3600)),
                'updated_at'  => date('Y-m-d H:i:s', time() - mt_rand(3600, 30*24*3600))
            ];
        }
        DB::table('articles')->insert($data);
    }
}
