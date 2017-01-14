<?php
namespace App\Libraries;

use League\HTMLToMarkdown\HtmlConverter;
use Parsedown;

class Markdown
{
    private static $instance;

    protected $htmlParser;
    protected $markdownParser;

    private function __construct()
    {
        $this->htmlParser = new HtmlConverter(['header_style' => 'atx']);
        $this->markdownParser = new Parsedown();
    }

    public static function create()
    {
        if (! self::$instance instanceof self) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function htmlToMarkdown($html)
    {
        return $this->htmlParser->convert($html);
    }

    public function markdownToHtml($markdown)
    {
        $convertedHmtl = $this->markdownParser->setBreaksEnabled(true)->text($markdown);

        return $convertedHmtl;
    }
}
