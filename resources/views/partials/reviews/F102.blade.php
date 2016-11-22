<div class="reviews__body">
    @if(!empty($review->json->bestPriceComment) || !empty($review->json->bestPrice))
        <div class="reviews__body__one">
            <p><strong>Опис вимог</strong></p>
            @if(!empty($review->json->bestPrice))
                <p><em>Чи дозволяють вимоги до предмету закупівлі придбати якісний товар за оптимальну ціну?</em><br><span class="{{ $review->json->bestPrice }}">{{ $review->json->bestPrice=='yes'?'ТАК':'НІ' }}</span></p>
            @endif
            @if(!empty($review->json->bestPriceComment))
                <p>{!! nl2br(trim(strip_tags($review->json->bestPriceComment))) !!}</p>
            @endif
        </div>
    @endif
    @if(!empty($review->json->maxCompetitionComment) || !empty($review->json->maxCompetition))
        <div class="reviews__body__one">
            <p><strong>Конкуренція</strong></p>
            @if(!empty($review->json->maxCompetition))
                <p><em>Чи здатні такі вимоги забезпечити максимальну конкуренцію серед учасників?</em><br><span class="{{ $review->json->maxCompetition }}">{{ $review->json->maxCompetition=='yes'?'ТАК':'НІ' }}</span></p>
            @endif
            @if(!empty($review->json->maxCompetitionComment))
                <p>{!! nl2br(trim(strip_tags($review->json->maxCompetitionComment))) !!}</p>
            @endif
        </div>
    @endif
    @if(!empty($review->json->productQualityComment) || !empty($review->json->productQuality))
        <div class="reviews__body__one">
            <p><strong>Якість продукту</strong></p>
            @if(!empty($review->json->productQuality))
                <p><em>Чи зрозуміло потенційному постачальнику товар якої якості очікує придбати замовник?</em><br><span class="{{ $review->json->productQuality }}">{{ $review->json->productQuality=='yes'?'ТАК':'НІ' }}</span></p>
            @endif
            @if(!empty($review->json->productQualityComment))
                <p>{!! nl2br(trim(strip_tags($review->json->productQualityComment))) !!}</p>
            @endif
        </div>
    @endif
    @if(!empty($review->json->qualitativeCriteriaComment) || !empty($review->json->qualitativeCriteria))
        <div class="reviews__body__one">
            <p><strong>Оцінка критеріїв</strong></p>
            @if(!empty($review->json->qualitativeCriteria))
                <p><em>Чи передбачена процедура оцінки якісних критеріїв предмету закупівлі на етапі кваліфікації/укладання договору/виконання договору?</em><br><span class="{{ $review->json->qualitativeCriteria }}">{{ $review->json->qualitativeCriteria=='yes'?'ТАК':'НІ' }}</span></p>
            @endif
            @if(!empty($review->json->qualitativeCriteriaComment))
                <p>{!! nl2br(trim(strip_tags($review->json->qualitativeCriteriaComment))) !!}</p>
            @endif
        </div>
    @endif
</div>