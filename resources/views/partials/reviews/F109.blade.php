<div class="reviews__body">
    <h4>Правомірність відміни закупівлі</h4>
    @if(!empty($review->json->cancellationLegitimacyComment) || !empty($review->json->cancellationLegitimacy))
        <div class="reviews__body__one">
            @if(!empty($review->json->cancellationLegitimacyComment))
                <p>{!! nl2br(trim(strip_tags($review->json->cancellationLegitimacyComment))) !!}</p>
            @endif
            @if(!empty($review->json->cancellationLegitimacy))
                <p><em>Чи доцільне, на ваш погляд, використання банківської гарантії в цій закупівлі?</em><br>
                    <span class="{{ $review->json->cancellationLegitimacy }}">
                        {{ $review->json->cancellationLegitimacy=='yes'?'ТАК':'НІ' }}
                    </span>
                </p>
            @endif
        </div>
    @endif
</div>