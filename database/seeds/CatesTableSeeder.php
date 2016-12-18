<?php

use Illuminate\Database\Seeder;

class CatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['pid' => 0, 'name' => '后台开发', 'order_num' => 0, 'created_at' => '2016-12-18 19:32:49', 'updated_at' => '2016-12-18 19:32:49'],
            ['pid' => 0, 'name' => '前端开发', 'order_num' => 0, 'created_at' => '2016-12-18 19:32:49', 'updated_at' => '2016-12-18 19:32:49'],
            ['pid' => 0, 'name' => '数据库', 'order_num' => 0, 'created_at' => '2016-12-18 19:32:49', 'updated_at' => '2016-12-18 19:32:49'],
            ['pid' => 0, 'name' => '运维', 'order_num' => 0, 'created_at' => '2016-12-18 19:32:49', 'updated_at' => '2016-12-18 19:32:49'],
            ['pid' => 0, 'name' => '随笔', 'order_num' => 0, 'created_at' => '2016-12-18 19:32:49', 'updated_at' => '2016-12-18 19:32:49'],
            ['pid' => 1, 'name' => 'PHP', 'order_num' => 0, 'created_at' => '2016-12-18 19:32:49', 'updated_at' => '2016-12-18 19:32:49'],
            ['pid' => 1, 'name' => 'shell', 'order_num' => 0, 'created_at' => '2016-12-18 19:32:49', 'updated_at' => '2016-12-18 19:32:49'],
            ['pid' => 2, 'name' => 'html/css', 'order_num' => 0, 'created_at' => '2016-12-18 19:32:49', 'updated_at' => '2016-12-18 19:32:49'],
            ['pid' => 2, 'name' => 'js', 'order_num' => 0, 'created_at' => '2016-12-18 19:32:49', 'updated_at' => '2016-12-18 19:32:49'],
            ['pid' => 3, 'name' => 'mysql', 'order_num' => 0, 'created_at' => '2016-12-18 19:32:49', 'updated_at' => '2016-12-18 19:32:49'],
            ['pid' => 3, 'name' => 'redis', 'order_num' => 0, 'created_at' => '2016-12-18 19:32:49', 'updated_at' => '2016-12-18 19:32:49'],
            ['pid' => 4, 'name' => 'linux', 'order_num' => 0, 'created_at' => '2016-12-18 19:32:49', 'updated_at' => '2016-12-18 19:32:49'],
            ['pid' => 4, 'name' => 'windows', 'order_num' => 0, 'created_at' => '2016-12-18 19:32:49', 'updated_at' => '2016-12-18 19:32:52']
        ];

        DB::table('cates')->insert($data);
    }
}
