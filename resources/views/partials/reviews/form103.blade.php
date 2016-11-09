<div class="reviews__body">
    <h4>Неупередженість/недискримінаційність вимог закупівлі</h4>
    @if(!empty($review->json->impartialProductRequirementsComment) || !empty($review->json->impartialProductRequirements))
        <div class="reviews__body__one">
            <p><strong>Опис вимог</strong></p>
            @if(!empty($review->json->impartialProductRequirementsComment))
                <p>{!! nl2br(trim(strip_tags($review->json->impartialProductRequirementsComment))) !!}</p>
            @endif
            @if(!empty($review->json->impartialProductRequirements))
                <p><em>Вимоги до предмету закупівлі неупередженими і такими, що не створюють переваги окремим учасникам</em></p>
            @endif
        </div>
        <hr>
    @endif
</div>