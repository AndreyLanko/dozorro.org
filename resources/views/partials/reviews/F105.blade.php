<div class="reviews__body">
    <h4>Правильність застосування кодів класифікаторів</h4>
    @if(!empty($review->json->correctClassifiersCodesComment) || !empty($review->json->correctClassifiersCodes))
        <div class="reviews__body__one">
            @if(!empty($review->json->correctClassifiersCodes))
                <p>{!! nl2br(trim(strip_tags($review->json->correctClassifiersCodes))) !!}</p>
            @endif
            @if(!empty($review->json->impartialProductRequirements) && $review->json->impartialProductRequirements!='no')
                <p><em>Замовник правильно визначив код товару/товарів, що закуповуються</em></p>
            @endif
        </div>
    @endif
</div>