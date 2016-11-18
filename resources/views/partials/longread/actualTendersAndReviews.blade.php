
<div class="c-top-items">
    <div class="container">
        <div class="row">
            <div class="col-md-6 c-top-items__col c-top-items__col--right-padding">
                <div>
                    <div>
                        <h2>Актуальнi тендери</h2>
                        @foreach($block->data['tenders'] as $item)
                            @if($item->data)
                                <!-- sb-top-item -->
                                <div class="sb-top-item">
                                    <h3><a href="/tender/{{ $item->data->id }}">{{ $item->data->title }}</a></h3>
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
                                                {{ $dataStatuses[$item->data->status] }}
                                            </div>
                                        </div>
                                        <div class="sb-top-item__row">
                                            <div class="sb-top-item__cell">
                                                Вiдгукiв:
                                            </div>
                                            <div class="sb-top-item__cell">
                                                {{ $item->count_reviews }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END sb-top-item -->
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-6 c-top-items__col c-top-items__col--left-padding">
                <div>
                    <div>
                        <h2>Останнi вiдгуки</h2>
                        @foreach($block->data['tenders'] as $item)
                            @if(isset($item->data))
                                <div class="sb-top-item">
                                    <a href="/tender/{{ $item->data->id }}">
                                        {{ $item->data->procuringEntity->name }}
{{--                                        {{ $item->payload->userForm->generalComment }}--}}
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>