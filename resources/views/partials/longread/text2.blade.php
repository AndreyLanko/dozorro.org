@if(!empty($data->text_title) || !empty($data->text_text))
<div class="c-a">
    <div class="container">
        @if(!empty($data->text_title))
            <h2>{{ $data->text_title }}</h2>
        @endif
        {!! $data->text_text !!}
    </div>
</div>
@endif