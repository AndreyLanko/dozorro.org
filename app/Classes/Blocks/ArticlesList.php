<?php

namespace App\Classes\Blocks;

use DB;
use App\Models\Blog\Blog;

/**
 * Class ActualTendersAndReviews
 * @package App\Classes\Blocks
 */
class ArticlesList extends IBlock
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


    /**
     * @return array
     */
    public function get()
    {
        $this->blog = new Blog();

        return [
            'articles' => $this->getArticles(),
        ];
    }
}
