<div class="reviews__body">
    @if(!empty($review->json->impartialProductRequirementsComment) || !empty($review->json->impartialProductRequirements))
        <div class="reviews__body__one">
            @if(!empty($review->json->impartialProductRequirements))
                <p><em>Чи є вимоги до предмету закупівлі неупередженими і такими, що не створюють переваги окремим учасникам?</em></p>
            @endif
            @if(!empty($review->json->impartialProductRequirements))
                <span class="{{ $review->json->impartialProductRequirements }}">
                    {{ $review->json->impartialProductRequirements=='yes'?'ТАК':'НІ' }}
                </span>
            @endif
            @if(!empty($review->json->impartialProductRequirementsComment))
                <p>{!! nl2br(trim(strip_tags($review->json->impartialProductRequirementsComment))) !!}</p>
            @endif
        </div>
    @endif
</div>