<div class="reviews__body">
    @if(!empty($review->json->bankGuaranteeExpediencyComment) || !empty($review->json->bankGuaranteeExpediency))
        <div class="reviews__body__one">
            @if(!empty($review->json->bankGuaranteeExpediency))
                <p><em>Чи доцільне, на ваш погляд, використання банківської гарантії в цій закупівлі?</em></p>
            @endif
            @if(!empty($review->json->bankGuaranteeExpediencyComment))
                <p><span class="{{ $review->json->bankGuaranteeExpediency }}">{{ $review->json->bankGuaranteeExpediency=='yes'?'ТАК':'НІ' }}</span>, {!! nl2br(trim(strip_tags($review->json->bankGuaranteeExpediencyComment))) !!}</p>
            @endif
        </div>
    @endif
</div>