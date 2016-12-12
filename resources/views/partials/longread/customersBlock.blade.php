@if(!empty($block->data->customers))
    <div class="c-customers">
        <div class="container">
            <div class="col-md-12 c-top-items__col">
                @if(!empty($data->customers_title))
                    <h2>{{ $data->customers_title }}</h2>
                @endif
                @foreach($block->data->customers as $customer)
                    <div><a href="{{ $customer->url }}"><img src="{{ $customer->logo }}"></a></div>
                @endforeach
            </div>
        </div>
    </div>
@endif