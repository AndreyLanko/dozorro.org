<?php

namespace App\Classes\Blocks;

use App\JsonForm;

/**
 * Class LastReviews
 * @package App\Classes\Blocks
 */
class LastReviews extends IBlock
{
    /**
     * @return array
     */
    public function get()
    {
        /**
         * @var array $comments
         */
        $comments = JsonForm::where('schema', 'F101')->limit($this->block->value->last_reviews_limit)->get();
        
        foreach ($comments as $comment) {
            $comment->payload = json_decode($comment->payload);
        }

        return $comments;
    }
}
