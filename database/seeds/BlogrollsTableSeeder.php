<?php

use Illuminate\Database\Seeder;

class BlogrollsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['title'=> 'Laravel China', 'link' => 'https://laravel-china.org/', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['title'=> 'Laravel学院', 'link' => 'https://laravel-china.org/', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['title'=> 'bootstrap中文网', 'link' => 'https://laravel-china.org/', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['title'=> 'Github', 'link' => 'https://laravel-china.org/', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['title'=> 'FlatUI', 'link' => 'https://laravel-china.org/', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())],
            ['title'=> 'jQuery API', 'link' => 'https://laravel-china.org/', 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())]
        ];

        DB::table('blogrolls')->insert($data);
    }
}
