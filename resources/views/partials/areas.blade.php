@foreach ($areas as $item)
    <div>
        <h4>{{ $item->title }}</h4>
        <p>{{ $item->description }}</p>
        <a href="{{ $item->url }}">{{ $item->title }}</a>
    </div>
@endforeach