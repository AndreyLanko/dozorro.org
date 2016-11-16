<div class="reviews__item @if (isset($parent)) review__parent-{{ $parent->id }} hide @endif" data-form="{{ $review->model }}" data-date="{{ $review->date->format('d.m.Y H:i') }}">
    <div class="reviews__header">
        <span class="reviews__author reviews__author--{{ $review->user_name ? 'not-':'not-'}}confirmed">(контактна інформація прихована)</span><span class="reveiw__date">{{ $review->date->format('d.m.Y H:i') }}</span>
    </div>

    @include('partials/reviews/'.$review->schema)

    @if (sizeof($review->comments()))
        @foreach ($review->comments() as $comment)
        {{dd($comment->json)}}
            <div class="reviews__item reviews__item--deep-1">
                <div class="reviews__header">
                    <span class="reviews__author reviews__author--{{ $comment->author->name ? 'not-':'not-'}}confirmed">(контактна інформація прихована)</span><span class="reveiw__date">{{ $comment->date->format('d.m.Y H:i') }}</span>
                </div>
                <div class="reviews__body">
                    <p>{!! nl2br(trim(strip_tags($comment->json->comment))) !!}</p>
                </div>
            </div>
        @endforeach
    @endif    

    <a href=""
        class="open-comment__button"
        data-thread="{{ $review->object_id }}"
        data-formjs="jsonForm"
        data-form="comment"
        data-form-title="Ваш коментар"
        data-submit-button="Додати коментар"
        data-model="comment"
        data-validate="comment"
        data-init="comment">
           Залишити коментар
    </a>

    @if (sizeof($review->reviews) > 0 && $show_related)
        <a href="" data-parent="{{ $review->id }}" class="open-reviews__button">Показати всі відгуки користувача</a>
    @endif
</div>