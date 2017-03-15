<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Libraries\Markdown;
use App\Article;

class Cli extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cli:run {script} {--start=1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'script for wp2lara-blog';

    private $markdown;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->markdown = Markdown::create();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $script = $this->argument('script');

        $scripts = [
            'original'
        ];

        if (! in_array($script, $scripts)) {
            $this->error('Invalid Argument: script');
            exit();
        }

        $_method = 'do' . ucfirst(strtolower($script));
        $this->{$_method}();
        $this->info('finished ! script: ' . $script);
    }

    private function doOriginal()
    {
        $start = $this->option('start');

        while ($article = Article::where('Id', '>=', $start)->first())
        {
            $article->summary_original = $this->markdown->htmlToMarkdown($article->summary);
            $article->content_original = $this->markdown->htmlToMarkdown($article->content);
            $article->save();

            $start++;
        }
    }
}
