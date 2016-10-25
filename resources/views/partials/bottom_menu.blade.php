<ul>
    @foreach($bottom_menu as $item)
        <li>
            <a href="{{ $item->url }}">{{ $item->title }}</a>
        </li>
    @endforeach
</ul>