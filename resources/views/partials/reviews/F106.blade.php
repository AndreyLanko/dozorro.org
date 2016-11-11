<div class="reviews__body">
    <h4>Правильність визначення очікуваної вартості</h4>
    @if(!empty($review->json->correctExpectedCostComment) || !empty($review->json->correctExpectedCost))
        <div class="reviews__body__one">
            @if(!empty($review->json->correctExpectedCostComment))
                <p>{!! nl2br(trim(strip_tags($review->json->correctExpectedCostComment))) !!}</p>
            @endif
            @if(!empty($review->json->correctExpectedCost))
                <p><em>Чи правильно замовник визначив очікувану вартість? Наскільки така вартість відповідає ринковим цінам?</em><br>
                    <span class="{{ $review->json->correctClassifiersCodes }}">
                        {{ $review->json->correctClassifiersCodes=='yes'?'ТАК':'НІ' }}
                    </span>
                </p>
            @endif
        </div>
    @endif
</div>