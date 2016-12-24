<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class WordpressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->generateArticles();
        $this->generateCates();
        $this->generateTags();

        $this->generateArticleCates();
        $this->generateArticleTags();
    }

    private function generateArticles()
    {
        DB::connection('mysql')->table('articles')->truncate();

        $posts = DB::connection('wordpress')
            ->table('posts')
            ->select(['ID', 'post_date', 'post_content', 'post_title', 'post_modified', 'post_id', 'meta_key', 'meta_value as read_num'])
            ->where('post_status', '=', 'publish')
            ->where('post_type', '=', 'post')
            ->join('postmeta', function ($join) {
                $join->on('posts.ID', '=', 'postmeta.post_id')
                    ->where('postmeta.meta_key', '=', 'post_views_count');
            })
            ->orderBy('post_date', 'asc')
            ->get();

        $articles = array();

        foreach ($posts as $post)
        {
            $tmp = [];

            $content = $post->post_content;
            $summary = $this->_getSummaryByContent($content);

            $tmp = [
                'wp_post_id' => $post->ID,
                'title' => $post->post_title,
                'summary' => $summary,
                'content' => $content,
                'read_num' => $post->read_num,
                'published_at' => $post->post_date,
                'created_at' => $post->post_date,
                'updated_at' => $post->post_modified
            ];

            $articles[] = $tmp;
        }

        // dd($articles);

        DB::connection('mysql')->table('articles')->insert($articles);
    }

    private function generateCates()
    {
        DB::connection('mysql')->table('cates')->truncate();
        $faker = Faker::create();

        $terms = DB::connection('wordpress')->table('terms')
            ->select(['terms.term_id', 'name', 'term_order', 'taxonomy', 'parent'])
            ->orderBy('terms.term_id', 'asc')
            ->join('term_taxonomy', function ($join) {
                $join->on('terms.term_id', '=', 'term_taxonomy.term_id')
                    ->where('term_taxonomy.taxonomy', '=', 'category');
            })
            ->get();


        $cates = $map = [];
        $id = 1;
        foreach ($terms as $term)
        {
            $tmp = [];

            $parent_id = intval($term->parent);
            $term_id   = intval($term->term_id);

            if ($parent_id != 0) {
                continue;
            }

            $tmp = [
                'Id' => $id,
                'pid' => 0,
                'name' => $term->name,
                'color' => $faker->hexcolor,
                'order_num' => 0,
                'wp_term_id' => $term_id,
                'wp_parent_id' => $parent_id,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ];

            $cates[] = $tmp;
            $map[$term_id] = $id;
            $id++;
        }

        foreach ($terms as $term)
        {
            $tmp = [];

            $parent_id = $term->parent;
            if ($parent_id == 0) {
                continue;
            }

            $pid = isset($map[$parent_id]) ? $map[$parent_id] : 0;

            $tmp = [
                'Id' => $id,
                'pid' => $pid,
                'name' => $term->name,
                'color' => $faker->hexcolor,
                'order_num' => 0,
                'wp_term_id' => $term->term_id,
                'wp_parent_id' => $parent_id,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ];

            $cates[] = $tmp;
            $id++;
        }

        // dd($cates);
        DB::connection('mysql')->table('cates')->insert($cates);
    }

    private function generateTags()
    {
        DB::connection('mysql')->table('tags')->truncate();
        $faker = Faker::create();

        $terms = DB::connection('wordpress')->table('terms')
            ->select(['terms.term_id', 'name', 'term_order', 'taxonomy'])
            ->orderBy('terms.term_id', 'asc')
            ->join('term_taxonomy', function ($join) {
                $join->on('terms.term_id', '=', 'term_taxonomy.term_id')
                    ->where('term_taxonomy.taxonomy', '=', 'post_tag');
            })
            ->get();

        $tags = [];
        foreach ($terms as $term)
        {
            $tmp = [
                'name' => $term->name,
                'color' => $faker->hexcolor,
                'wp_term_id' => $term->term_id,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ];
            $tags[] = $tmp;
        }

        // dd($tags);
        DB::connection('mysql')->table('tags')->insert($tags);
    }

    private function generateArticleCates()
    {
        DB::connection('mysql')->table('article_cates')->truncate();
        $faker = Faker::create();

        $posts = DB::connection('wordpress')->table('posts')
            ->where('post_status', '=', 'publish')
            ->where('post_type', '=', 'post')
            ->get();

        $postIdList = [];
        foreach ($posts as $post) {
            $post_id = intval($post->ID);
            $postIdList[] = $post_id;
        }

        $term_relationships = DB::connection('wordpress')->table('term_relationships')
            ->whereIn('object_id', $postIdList)
            ->join('term_taxonomy', function ($join) {
                $join->on('term_relationships.term_taxonomy_id', '=', 'term_taxonomy.term_taxonomy_id')
                    ->where('term_taxonomy.taxonomy', '=', 'category');
            })
            ->join('terms', 'term_taxonomy.term_id', '=', 'terms.term_id')
            ->get();

        $termIdCateIdMap    = $this->_getColumnsMap('cates',    'wp_term_id', 'Id');
        $postIdArticleIdMap = $this->_getColumnsMap('articles', 'wp_post_id', 'Id');

        $article_cates = [];
        foreach ($term_relationships as $term_relationship)
        {
            $post_id = intval($term_relationship->object_id);
            $term_id = intval($term_relationship->term_id);

            if (! isset($termIdCateIdMap[$term_id]) || ! isset($postIdArticleIdMap[$post_id])) {
                continue;
            }

            $article_cates[] = [
                'article_id' => $postIdArticleIdMap[$post_id],
                'cate_id'    => $termIdCateIdMap[$term_id],
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ];
        }


        // dd($article_cates);
        DB::connection('mysql')->table('article_cates')->insert($article_cates);
    }

    private function generateArticleTags()
    {
        DB::connection('mysql')->table('article_tags')->truncate();
        $faker = Faker::create();

        $posts = DB::connection('wordpress')->table('posts')
            ->where('post_status', '=', 'publish')
            ->where('post_type', '=', 'post')
            ->get();

        $postIdList = [];
        foreach ($posts as $post) {
            $post_id = intval($post->ID);
            $postIdList[] = $post_id;
        }

        $term_relationships = DB::connection('wordpress')->table('term_relationships')
            ->whereIn('object_id', $postIdList)
            ->join('term_taxonomy', function ($join) {
                $join->on('term_relationships.term_taxonomy_id', '=', 'term_taxonomy.term_taxonomy_id')
                    ->where('term_taxonomy.taxonomy', '=', 'post_tag');
            })
            ->join('terms', 'term_taxonomy.term_id', '=', 'terms.term_id')
            ->get();

        $termIdTagIdMap     = $this->_getColumnsMap('tags',     'wp_term_id', 'Id');
        $postIdArticleIdMap = $this->_getColumnsMap('articles', 'wp_post_id', 'Id');

        $article_tags = [];
        foreach ($term_relationships as $term_relationship)
        {
            $post_id = intval($term_relationship->object_id);
            $term_id = intval($term_relationship->term_id);

            if (! isset($termIdTagIdMap[$term_id]) || ! isset($postIdArticleIdMap[$post_id])) {
                continue;
            }

            $article_tags[] = [
                'article_id' => $postIdArticleIdMap[$post_id],
                'tag_id'     => $termIdTagIdMap[$term_id],
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ];
        }


        // dd($article_tags);
        DB::connection('mysql')->table('article_tags')->insert($article_tags);
    }

    private function _getSummaryByContent($content)
    {
        $array = explode('<!--more-->', $content);

        if (! is_array($array) || count($array) < 2) {
            return '';
        }

        return trim($array[0]);
    }

    private function _getColumnsMap($table, $key_column, $value_column)
    {
        $collections = DB::connection('mysql')->table($table)
            ->select([$key_column, $value_column])
            ->get();

        $map = [];
        foreach ($collections as $collection)
        {
            $key_column_val   = $collection->$key_column;
            $value_column_val = $collection->$value_column;

            if (! isset($key_column_val)) {
                continue;
            }

            $map[$key_column_val] = $value_column_val;
        }
        return $map;
    }
}
