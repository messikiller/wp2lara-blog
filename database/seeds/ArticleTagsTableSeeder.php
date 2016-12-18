<?php

use Illuminate\Database\Seeder;

class ArticleTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $tagIds = DB::table('tags')->select('Id')->pluck('Id')->toArray();
        $articleIds = DB::table('articles')->select('Id')->take(20)->pluck('Id');

        $data = array();
        foreach ($articleIds as $article_id) {
            $tag_num = mt_rand(0, 3);
            if ($tag_num == 0) {
                continue;
            }

            $tag_id = mt_rand(3, 10);

            for ($i=1; $i <= $tag_num ; $i++) {
                $data[] = [
                    'article_id' => $article_id,
                    'tag_id' => $tag_id--,
                    'created_at'  => date('Y-m-d H:i:s', time() - mt_rand(3600, 30*24*3600)),
                    'updated_at'  => date('Y-m-d H:i:s', time() - mt_rand(3600, 30*24*3600))
                ];
            }
        }
        DB::table('article_tags')->insert($data);
    }
}
