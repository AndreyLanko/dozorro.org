<div class="reviews__body">
    <h4>Чіткість/зрозумілість вимог до предмету закупівліі</h4>
    @if(!empty($review->json->bestPriceComment) || !empty($review->json->bestPrice))
        <div class="reviews__body__one">
            <p><strong>Опис вимог</strong></p>
            @if(!empty($review->json->bestPriceComment))
                <p>{!! nl2br(trim(strip_tags($review->json->bestPriceComment))) !!}</p>
            @endif
            @if(!empty($review->json->bestPrice))
                <p><em>Вимоги до предмету закупівлі дозволяють придбати якісний товар за оптимальну ціну</em></p>
            @endif
        </div>
        <hr>
    @endif
    @if(!empty($review->json->maxCompetitionComment) || !empty($review->json->maxCompetition))
        <div class="reviews__body__one">
            <p><strong>Конкуренція</strong></p>
            @if(!empty($review->json->maxCompetitionComment))
                <p>{!! nl2br(trim(strip_tags($review->json->maxCompetitionComment))) !!}</p>
            @endif
            @if(!empty($review->json->maxCompetition))
                <p><em>Вимоги здатні забезпечити максимальну конкуренцію серед учасників</em></p>
            @endif
        </div>
        <hr>
    @endif
    @if(!empty($review->json->qualitativeComment))
        <div class="reviews__body__one">
            <p><strong>Якість продукту</strong></p>
            <p>{!! nl2br(trim(strip_tags($review->json->qualitativeComment))) !!}</p>
            @if(!empty($review->json->qualitativeUnderstand))
                <p><em>Потенційному постачальнику зрозуміло товар якої якості очікує придбати замовник</em></p>
            @endif
        </div>
        <hr>
    @endif
    @if(!empty($review->json->qualitativeCriteriaComment) || !empty($review->json->qualitativeCriteria))
        <div class="reviews__body__one">
            <p><strong>Оцінка критеріїв</strong></p>
            @if(!empty($review->json->qualitativeCriteriaComment))
                <p>{!! nl2br(trim(strip_tags($review->json->qualitativeCriteriaComment))) !!}</p>
            @endif
            @if(!empty($review->json->qualitativeCriteria))
                <p><em>Передбачена процедура оцінки якісних критеріїв предмету закупівлі на етапі кваліфікації/укладання договору/виконання договору</em></p>
            @endif
        </div>
    @endif
</div>
<div class="reviews__footer">
    <div class="reviews__useful-rating">
        <h3>Відгук корисний для вас?</h3>

        <div class="reviews__useful-wrap">
            <span class="reviews__useful-moji"></span>
            <span class="reviews__useful-moji-rating-count">(? оцінок)</span>
        </div>
    </div>
</div>