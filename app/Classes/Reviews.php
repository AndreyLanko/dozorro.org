<?php

namespace App\Classes;

use Illuminate\Database\Eloquent\Collection;

/**
 * Class Reviews
 * @package App\Classes
 */
class Reviews
{
    /**
     * @var Collection $reviews
     */
    private $reviews;

    /**
     * Reviews constructor.
     * @param $reviews
     */
    public function __construct($reviews)
    {
        $this->reviews = $this->handleReviews($reviews);
    }

    /**
     * @param $reviews
     * @return Collection
     */
    private function handleReviews($reviews)
    {
        $groupedReviews = $this->groupReviews($reviews);

        /**
         * @var Collection $reviews
         */
        $reviews = $reviews->filter(function ($review) {
            return empty($review->user_email);
        });

        return $reviews->merge($groupedReviews)->sortByDesc('created_at');
    }

    /**
     * @param $reviews
     * @return Collection
     */
    private function groupReviews($reviews)
    {
        $groupedReviews = new Collection();

        /**
         * @var Collection $item Collection of grouped reviews
         */
        foreach ($reviews->groupBy('user_email') as $key => $item) {
            if (empty($key)) {
                continue;
            }

            $filteredReviews = $item->where('model', 'F101')->sortBy('created_at')->first();

            if (empty($filteredReviews)) {
                $filteredReviews = $item->sortBy('created_at')->first();
            }

            $groupedReviews->add($this->handleGroupedReviews($filteredReviews, $item));
        }

        return $groupedReviews;
    }

    /**
     * @param $firstReview
     * @param $reviews
     * @return mixed
     */
    private function handleGroupedReviews($firstReview, $reviews)
    {
        $firstReview->reviews = $reviews->filter(function ($review) use ($firstReview) {
            return $review->id != $firstReview->id;
        });

        return $firstReview;
    }

    /**
     * @return mixed
     */
    public function getReviews()
    {
        return $this->reviews;
    }
}
