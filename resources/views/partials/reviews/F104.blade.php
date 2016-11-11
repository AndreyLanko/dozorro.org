<div class="reviews__body">
    <h4>Неупередженість/недискримінаційність вимог до учасника</h4>
    @if(!empty($review->json->impartialParticipantRequirementsComment) || !empty($review->json->impartialParticipantRequirements))
        <div class="reviews__body__one">
            @if(!empty($review->json->impartialParticipantRequirements))
                <p><em>Чи є вимоги до учасника доцільними і неупередженими – такими, що не створюють переваги окремим учасникам?</em><br><span class="{{ $review->json->impartialParticipantRequirements }}">{{ $review->json->impartialParticipantRequirements=='yes'?'ТАК':'НІ' }}</span></p>
            @endif
            @if(!empty($review->json->impartialParticipantRequirementsComment))
                <p>{!! nl2br(trim(strip_tags($review->json->impartialParticipantRequirementsComment))) !!}</p>
            @endif
        </div>
    @endif
</div>