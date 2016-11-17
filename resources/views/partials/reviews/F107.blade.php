<div class="reviews__body">
    @if(!empty($review->json->lotsExpediencyComment) || !empty($review->json->lotsExpediency))
        <div class="reviews__body__one">
            @if(!empty($review->json->lotsExpediency))
                <p><em>Чи доцільне, на ваш погляд, розділення предмету закупівлі на лоти в цій закупівлі?</em></p>
            @endif
            @if(!empty($review->json->lotsExpediencyComment))
                <p><span class="{{ $review->json->lotsExpediency }}">{{ $review->json->lotsExpediency=='yes'?'ТАК':'НІ' }}</span>, {!! nl2br(trim(strip_tags($review->json->lotsExpediencyComment))) !!}</p>
            @endif
        </div>
    @endif
</div>