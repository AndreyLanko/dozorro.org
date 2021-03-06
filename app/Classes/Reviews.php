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

        $reviews = $reviews->filter(function ($review) {
            return empty($review->author->email);
        });

        return $reviews->merge($groupedReviews)->sortByDesc('created_at');
    }

    /**
     * @param $reviews
     * @return Collection
     */
    private function groupReviews($reviews)
    {
//        return $reviews;

        $reviewsResult = [];
        $groupedReviews = new Collection();

        foreach ($reviews as $item => $review) {
            if (!array_key_exists($review->getPayload()->author->email, $reviewsResult)) {
                $reviewsResult[$review->getPayload()->author->email] = new Collection();
            }

            $reviewsResult[$review->getPayload()->author->email]->add($review);
        }

        foreach ($reviewsResult as $key => $item) {
            if (empty($key)) {
                continue;
            }

            $filteredReviews = $item->where('schema', 'F101')->sortBy('date')->first();

            if (empty($filteredReviews)) {
                $filteredReviews = $item->sortBy('date')->first();
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
