<div class="reviews__body">
    <p>{!! nl2br(trim(strip_tags($review->json->generalComment))) !!}</p>
</div>
<div class="reviews__footer">
    <div class="reviews__stars">
        <h3>Умови закупівлі:</h3>
        <ul class="tender-stars tender-stars--{{ $review->json->generalScore }}">
            <li></li><li></li><li></li><li></li><li></li>
        </ul>
    </div>
    {{--
    <div class="reviews__useful-rating">
        <h3>Відгук корисний для вас?</h3>

        <div class="reviews__useful-wrap">
            <span class="reviews__useful-moji"></span>
            <span class="reviews__useful-moji-rating-count">(? оцінок)</span>
        </div>
    </div>
    --}}
</div>