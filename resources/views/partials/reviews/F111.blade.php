<div class="reviews__body">
    <h4>Оцінка якості та справедливості процесу кваліфікації</h4>
    @if(!empty($review->json->cheapestWasDisqualifiedComment) || !empty($review->json->cheapestWasDisqualified))
        <div class="reviews__body__one">
            @if(!empty($review->json->cheapestWasDisqualifiedComment))
                <p>{!! nl2br(trim(strip_tags($review->json->cheapestWasDisqualifiedComment))) !!}</p>
            @endif
            @if(!empty($review->json->cheapestWasDisqualified))
                <p><em>1. Чи було дискваліфіковано замовником найнижчу цінову пропозицію за підсумками аукціону (одну або декілька)?</em><br>
                    <span class="{{ $review->json->cheapestWasDisqualified }}">
                        {{ $review->json->cheapestWasDisqualified=='yes'?'ТАК':'НІ' }}
                    </span>
                </p>
            @endif
        </div>
    @endif
    @if(!empty($review->json->argumentativeDisqualificationComment) || !empty($review->json->argumentativeDisqualification))
        <div class="reviews__body__one">
            @if(!empty($review->json->argumentativeDisqualificationComment))
                <p>{!! nl2br(trim(strip_tags($review->json->argumentativeDisqualificationComment))) !!}</p>
            @endif
            @if(!empty($review->json->argumentativeDisqualification))
                <p><em>2. Чи було дискваліфіковано замовником найнижчу цінову пропозицію за підсумками аукціону (одну або декілька)?</em><br>
                    <span class="{{ $review->json->argumentativeDisqualification }}">
                        {{ $review->json->argumentativeDisqualification=='yes'?'ТАК':'НІ' }}
                    </span>
                </p>
            @endif
        </div>
    @endif
</div>