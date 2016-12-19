<?php

namespace App\Classes\Blocks;

use DB;
use App\Models\Blog\Blog;

/**
 * Class ActualTendersAndReviews
 * @package App\Classes\Blocks
 */
class LatestArticles extends IBlock
{
    public $blog;

    /**
     * @return array
     */
    private function getArticles()
    {
        /**
         * @var array $tenders
         */
        $articles = $this->blog->getPublishedPosts(['limit' => $this->block->value->articles_limit]);

        return $articles;
    }

    private function getMainArticle()
    {
        /**
         * @var array $tenders
         */
        $article = $this->blog->getPublishedPosts(['limit' => 1, 'is_main' => true]);

        return (isset($article->id) ? $article : false);
    }

    /**
     * @return array
     */
    public function get()
    {
        $this->blog = new Blog();

        return [
            'articles' => $this->getArticles(),
            'main_article' => $this->getMainArticle(),
        ];
    }
}
