<div class="reviews__body">
    <h4>Неупередженість/недискримінаційність вимог до учасника</h4>
    @if(!empty($review->json->impartialParticipantRequirementsComment) || !empty($review->json->impartialParticipantRequirements))
        <div class="reviews__body__one">
            @if(!empty($review->json->impartialParticipantRequirementsComment))
                <p>{!! nl2br(trim(strip_tags($review->json->impartialParticipantRequirementsComment))) !!}</p>
            @endif
            @if(!empty($review->json->impartialParticipantRequirements) && $review->json->impartialParticipantRequirements!='no')
                <p><em>вимоги до учасника доцільними і неупередженими – такими, що не створюють переваги окремим учасникам</em></p>
            @endif
        </div>
    @endif
</div>