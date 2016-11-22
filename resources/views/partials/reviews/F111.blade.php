<div class="reviews__body">
    @if(!empty($review->json->cheapestWasDisqualifiedComment) || !empty($review->json->cheapestWasDisqualified))
        <div class="reviews__body__one">
            @if(!empty($review->json->cheapestWasDisqualified))
                <p><em>Чи було дискваліфіковано замовником найнижчу цінову пропозицію за підсумками аукціону (одну або декілька)?</em></p>
            @endif
            @if(!empty($review->json->cheapestWasDisqualified))
                <span class="{{ $review->json->cheapestWasDisqualified }}">
                    {{ $review->json->cheapestWasDisqualified=='yes'?'ТАК':'НІ' }}
                </span>
            @endif
            @if(!empty($review->json->cheapestWasDisqualifiedComment))
                <p>{!! nl2br(trim(strip_tags($review->json->cheapestWasDisqualifiedComment))) !!}</p>
            @endif
        </div>
    @endif
    @if(!empty($review->json->argumentativeDisqualificationComment) || !empty($review->json->argumentativeDisqualification))
        <div class="reviews__body__one">
            @if(!empty($review->json->argumentativeDisqualification))
                <p><em>Чи було дискваліфіковано замовником найнижчу цінову пропозицію за підсумками аукціону (одну або декілька)?</em></p>
            @endif
            @if(!empty($review->json->argumentativeDisqualification))
                <span class="{{ $review->json->argumentativeDisqualification }}">
                    {{ $review->json->argumentativeDisqualification=='yes'?'ТАК':'НІ' }}
                </span>
            @endif
            @if(!empty($review->json->argumentativeDisqualificationComment))
                <p>{!! nl2br(trim(strip_tags($review->json->argumentativeDisqualificationComment))) !!}</p>
            @endif
        </div>
    @endif
</div>