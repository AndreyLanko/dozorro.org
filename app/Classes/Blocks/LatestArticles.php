<?php

namespace App\Classes\Blocks;

use App\JsonForm;
use Carbon\Carbon;
use DB;
use App\Models\Blog\Blog;

/**
 * Class ActualTendersAndReviews
 * @package App\Classes\Blocks
 */
class LatestArticles extends IBlock
{
    /**
     * @return array
     */
    private function getArticles()
    {
        /**
         * @var array $tenders
         */
        $articles = Blog::select('title', 'slug', 'published_at')->limit($this->block->value->articles_limit)->orderBy('created_at', 'desc')->get();

        return $articles;
    }

    /**
     * @return array
     */
    public function get()
    {
        return [
            'articles' => $this->getArticles(),
        ];
    }
}
