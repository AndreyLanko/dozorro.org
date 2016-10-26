@foreach ($areas as $item)
    <div>
        <h4>{{ $item->title }}</h4>
        <p>{{ $item->description }}</p>
        <a href="{{ $item->url }}">{{ $item->title }}</a>
    </div>
@endforeach

@if($areas)
    <div class="container wide-table">
        <div class="">
            <div class="tender--platforms border-bottom margin-bottom-xl">
                <h3>{{trans('tender.apply_title')}}</h3>
                {{trans('tender.apply_info')}}
                <div class="tender--platforms--list clearfix">
                    @foreach ($areas as $item)
                        <div class="item">
                            <div class="img-wr">
                                <a href="{{ $item->url }}" target="_blank">
                                    <img src="{{ env('BACKEND_URL') }}/{{ $item->image()->path }}" alt="{{ $item->title }}" title="{{ $item->title }}">
                                </a>
                            </div>
                            <div class="border-hover">
                                <div class="btn-wr">
                                    <a href="{{ $item->url }}" target="_blank" class="btn">{{trans('tender.apply_go')}}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{--<a href="#" class="more margin-bottom"><i class="sprite-arrow-down"></i> Показати всіх</a>--}}
            </div>
        </div>
    </div>
@endif