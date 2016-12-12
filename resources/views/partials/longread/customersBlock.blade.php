@if(!empty($block->data->customers))
    <div class="c-customers">
        <div class="container">
            <div class="row">
                <div class="col-md-12 c-top-items__col">
                    @if(!empty($data->customers_title))
                        <h2>{{ $data->customers_title }}</h2>
                    @endif
                    <div class="row">
                        @foreach($block->data->customers as $customer)
                            <div class="col-md-3"><a href="{{ $customer->url }}"><img src="{{ $customer->logo }}" style="width:100%"></a></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif