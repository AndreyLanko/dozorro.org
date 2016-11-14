<div class="reviews__item @if (isset($parent)) review__parent-{{ $parent->id }} hide @endif" data-form="{{ $review->model }}" data-date="{{ $review->date->format('d.m.Y H:i') }}">
    <div class="reviews__header">
        <span class="reviews__author reviews__author--{{ $review->user_name ? 'not-':'not-'}}confirmed">(контактна інформація прихована)</span><span class="reveiw__date">{{ $review->date->format('d.m.Y H:i') }}</span>
    </div>

    @include('partials/reviews/'.$review->schema)

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

    @if (sizeof($review->comments()))
        <div>
            <h3>Коментарі:</h3>

            @foreach ($review->comments() as $comment)
                <p>{{ $comment->json->text }}</p>
            @endforeach
        </div>
    @endif

    @if (sizeof($review->reviews) > 0 && $show_related)
        <a href="" data-parent="{{ $review->id }}" class="open-reviews__button">Показати всі відгуки користувача</a>
    @endif
</div>