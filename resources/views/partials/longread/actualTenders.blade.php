<div>
    @foreach($block->data as $item)
        @if($item->data)
            <h4>{{ $item->data->title }}</h4>
        @endif
    @endforeach
</div>