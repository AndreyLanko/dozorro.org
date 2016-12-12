@if(!empty($block->data->customers))
    <div class="c-text">
        <div class="container">
            @foreach($block->data->customers as $customer)
                <div><a href="{{ $customer->url }}"><img src="{{ $customer->logo }}"></a></div>
            @endforeach
        </div>
    </div>
@endif