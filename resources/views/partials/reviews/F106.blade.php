<div class="reviews__body">
    @if(!empty($review->json->correctExpectedCostComment) || !empty($review->json->correctExpectedCost))
        <div class="reviews__body__one">
            @if(!empty($review->json->correctExpectedCost))
                <p><em>Чи правильно замовник визначив очікувану вартість? Наскільки така вартість відповідає ринковим цінам?</em></p>
            @endif
            @if(!empty($review->json->correctExpectedCost))
                <span class="{{ $review->json->correctExpectedCost }}">
                    {{ $review->json->correctExpectedCost=='yes'?'ТАК':'НІ' }}
                </span>
            @endif
            @if(!empty($review->json->correctExpectedCostComment))
                <p>{!! nl2br(trim(strip_tags($review->json->correctExpectedCostComment))) !!}</p>
            @endif
        </div>
    @endif
</div>