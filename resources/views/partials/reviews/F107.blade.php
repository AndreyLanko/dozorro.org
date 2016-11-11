<div class="reviews__body">
    <h4>Доцільність використання лотів</h4>
    @if(!empty($review->json->lotsExpediencyComment) || !empty($review->json->lotsExpediency))
        <div class="reviews__body__one">
            @if(!empty($review->json->lotsExpediencyComment))
                <p>{!! nl2br(trim(strip_tags($review->json->lotsExpediencyComment))) !!}</p>
            @endif
            @if(!empty($review->json->lotsExpediency))
                <p><em>Чи доцільне, на ваш погляд, розділення предмету закупівлі на лоти в цій закупівлі?</em><br>
                    <span class="{{ $review->json->lotsExpediency }}">
                        {{ $review->json->lotsExpediency=='yes'?'ТАК':'НІ' }}
                    </span>
                </p>
            @endif
        </div>
    @endif
</div>