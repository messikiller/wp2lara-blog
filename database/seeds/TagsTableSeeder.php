<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array();
        foreach (range(1, 20) as $index) {
            $data[] = [
                'name' => str_random(mt_rand(5, 50)),
                'created_at'  => date('Y-m-d H:i:s', time() - mt_rand(3600, 30*24*3600)),
                'updated_at'  => date('Y-m-d H:i:s', time() - mt_rand(3600, 30*24*3600))
            ];
        }
        DB::table('tags')->insert($data);
    }
}
