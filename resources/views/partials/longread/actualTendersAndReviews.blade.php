<div class="c-hot">
    <div class="container">
        <div class="row">
            @if(!empty($block->data['tenders']))
                <div class="col-md-6">
                    <div class="c-list-card">
                        <div class="c-list-card__inner">
                    <h3 class="c-list-card__header">Актуальнi тендери</h3>
                    @foreach($block->data['tenders'] as $item)

                        <div class="sb-top-item">
                            <h3><a href="/tender/{{ $item->data->tenderID }}/">{{ $item->data->title }}</a></h3>
                            <div class="sb-top-item__table">
                                <div class="sb-top-item__row">
                                    <div class="sb-top-item__cell">
                                        Замовник:
                                    </div>
                                    <div class="sb-top-item__cell">
                                        {{ $item->data->procuringEntity->name }}
                                    </div>
                                </div>
                                <div class="sb-top-item__row">
                                    <div class="sb-top-item__cell">
                                        Статус:
                                    </div>
                                    <div class="sb-top-item__cell">
                                        {{ !empty($dataStatuses[$item->data->status]) ? $dataStatuses[$item->data->status] : 'не вказано'}}
                                    </div>
                                </div>
                                <div class="sb-top-item__row">
                                    <div class="sb-top-item__cell">
                                        Вiдгукiв:
                                    </div>
                                    <div class="sb-top-item__cell">
                                        {{ sizeof($item->reviews) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="c-list-card__link-wrap">
                        <a href="#">Всі тендери</a>
                    </div>
                </div>
                    </div>
                </div>
            @endif

            @if(!empty($block->data['reviews']))
                    <div class="col-md-6">
                    <h2>Обговорюванi тендери</h2>
                    @foreach($block->data['reviews'] as $item)
                        @if(isset($item->data))
                            <div class="sb-top-item">
                                <h3>
                                    <a href="/tender/{{ $item->data->tenderID }}/">{{ $item->data->title }}</a>
                                </h3>
                                <div class="sb-top-item__table">
                                    <div class="sb-top-item__row">
                                        <div class="sb-top-item__cell">
                                            Вiдгукiв:
                                        </div>
                                        <div class="sb-top-item__cell">
                                            {{ $item->data->total_reviews }}
                                        </div>
                                    </div>
                                    <div class="sb-top-item__row">
                                        <div class="sb-top-item__cell">
                                            Останнiй вiдгук:
                                        </div>
                                        <div class="sb-top-item__cell">
                                            {{ $item->data->last_review_date->diffForHumans() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif

        </div>
    </div>
</div>