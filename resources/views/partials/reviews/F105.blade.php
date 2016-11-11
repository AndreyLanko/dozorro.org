<div class="reviews__body">
    <h4>Правильність застосування кодів класифікаторів</h4>
    @if(!empty($review->json->correctClassifiersCodesComment) || !empty($review->json->correctClassifiersCodes))
        <div class="reviews__body__one">
            @if(!empty($review->json->correctClassifiersCodes))
                <p><em>Чи правильно замовник визначив код товару/товарів, що закуповуються?</em><br><span class="{{ $review->json->correctClassifiersCodes }}">{{ $review->json->correctClassifiersCodes=='yes'?'ТАК':'НІ' }}</span></p>
            @endif
            @if(!empty($review->json->correctClassifiersCodesComment))
                <p>{!! nl2br(trim(strip_tags($review->json->correctClassifiersCodesComment))) !!}</p>
            @endif
        </div>
    @endif
</div>