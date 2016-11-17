<div class="reviews__body">
    @if(!empty($review->json->correctClassifiersCodesComment) || !empty($review->json->correctClassifiersCodes))
        <div class="reviews__body__one">
            @if(!empty($review->json->correctClassifiersCodes))
                <p><em>Чи правильно замовник визначив код товару/товарів, що закуповуються?</em></p>
            @endif
            @if(!empty($review->json->correctClassifiersCodesComment))
                <p><span class="{{ $review->json->correctClassifiersCodes }}">{{ $review->json->correctClassifiersCodes=='yes'?'ТАК':'НІ' }}</span>, {!! nl2br(trim(strip_tags($review->json->correctClassifiersCodesComment))) !!}</p>
            @endif
        </div>
    @endif
</div>