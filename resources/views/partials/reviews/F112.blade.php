<div class="reviews__body">
    <h4>Оцінка виконання замовником умов договору про закупівлю (для постачальника)</h4>
    @if(!empty($review->json->purchaserDutiesExecutionComment) || !empty($review->json->purchaserDutiesExecution))
        <div class="reviews__body__one">
            @if(!empty($review->json->purchaserDutiesExecutionComment))
                <p>{!! nl2br(trim(strip_tags($review->json->purchaserDutiesExecutionComment))) !!}</p>
            @endif
            @if(!empty($review->json->purchaserDutiesExecution))
                <p><em>Оцініть якість виконання замовником своїх обов’язків</em><br>
                    <span class="{{ $review->json->purchaserDutiesExecution }}">
                        <ul class="tender-stars tender-stars--{{ $review->json->purchaserDutiesExecution }}">
                            <li></li><li></li><li></li><li></li><li></li>
                        </ul>
                    </span>
                </p><br>
            @endif
        </div>
    @endif
    @if(!empty($review->json->purchaserInteractionProblemsComment) || !empty($review->json->purchaserInteractionProblems))
        <div class="reviews__body__one">
            @if(!empty($review->json->purchaserInteractionProblemsComment))
                <p>{!! nl2br(trim(strip_tags($review->json->purchaserInteractionProblemsComment))) !!}</p>
            @endif
            @if(!empty($review->json->purchaserInteractionProblems))
                <p><em>Які саме проблеми виникли у взаємодії із замовником (оберіть один або декілька варіантів):</em><br>
                        @foreach($review->json->purchaserInteractionProblems as $value)
                            <span>{{ \App\JsonForm::getF112Enum($value) }}</span><br>
                        @endforeach
                </p>
            @endif
        </div>
    @endif
</div>