{{-- Актуальные тендеры --}}
<div>
    @foreach($block->data['tenders'] as $item)
        @if($item->data)
            <h4>{{ $item->data->title }}</h4>
        @endif
    @endforeach
</div>

{{-- Последние отзывы --}}
@foreach($block->data['reviews'] as $item)
    @if(isset($item->tender))
        <div>
            <a href="/tender/{{ $item->tender }}">
                {{ $item->payload->userForm->generalComment }}
            </a>
        </div>
        <br />
    @endif
@endforeach