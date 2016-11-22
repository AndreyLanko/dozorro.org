<div class="reviews__item{{ !empty($parent)?' reviews__item--deep-2':'' }}@if (isset($parent)) review__parent-{{ $parent->id }} hide @endif" data-form="{{ $review->model }}" data-date="{{ $review->date->format('d.m.Y H:i') }}">
    <div class="reviews__item-inner">
        <div class="reviews__header">
            @if($review->schema=='F101')
                <span class="reviews__author reviews__author--{{ $review->user_name ? 'not-':'not-'}}confirmed">(контактна інформація прихована)</span>
            @endif
            <span class="reveiw__date">{{ $review->date->format('d.m.Y H:i') }}</span>
        </div>
		    
        @include('partials/reviews/'.$review->schema)
		    
        <div class="reviews__footer">
            <div data-thread="{{ $review->object_id }}" form-comment style="float:right">
                <a href=""
                    class="open-comment__button"
                    data-formjs="jsonForm"
                    data-form="comment"
                    data-form-title="Ваш коментар"
                    data-submit-button="Додати коментар"
                    data-model="comment"
                    data-validate="comment"
                    data-init="comment">
                       Додати коментар
                </a>
            </div>
            @if (sizeof($review->comments()))
                <a href="" class="reviews__read-comments" data-formjs="comments" data-object-id="{{ $review->object_id }}">Читати коментарі: {{ sizeof($review->comments()) }}</a>
            @endif
            @if (sizeof($review->reviews) > 0 && $show_related)
                <a href="" data-parent="{{ $review->id }}" class="open-reviews__button" style="float:left">
                    <span>Показати всі відгуки користувача</span>
                    <span>Сховати всі відгуки користувача</span>
                </a>
            @endif
        </div>
    </div>
</div>