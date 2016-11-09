<div class="reviews__body">
    <h4>Неупередженість/недискримінаційність вимог закупівлі</h4>
    @if(!empty($review->json->impartialProductRequirementsComment) || !empty($review->json->impartialProductRequirements))
        <div class="reviews__body__one">
            @if(!empty($review->json->impartialProductRequirementsComment))
                <p>{!! nl2br(trim(strip_tags($review->json->impartialProductRequirementsComment))) !!}</p>
            @endif
            @if(!empty($review->json->impartialProductRequirements) && $review->json->impartialProductRequirements!='no')
                <p><em>Вимоги до предмету закупівлі неупередженими і такими, що не створюють переваги окремим учасникам</em></p>
            @endif
        </div>
    @endif
</div>