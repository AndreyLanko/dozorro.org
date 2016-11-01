@if (!empty($data->image))
    <div class="c-text">
        <div class="container">
            @if(!empty($data->image_title))
                <h3>{{ $data->image_title }}</h3>
            @endif
            <figure>
                <img src="{{ env('BACKEND_URL') }}{{ $data->image->path }}" width="100%">
                @if(!empty($data->image_text))
                    <figcaption><p>{{ $data->image_text }}</p></figcaption>
                @endif
            </figure>
        </div>
    </div>
@endif