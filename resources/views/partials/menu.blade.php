<ul>
    @foreach($main_menu as $item)
        <li>
            <a href="{{ $item->url }}">{{ $item->title }}</a>
        </li>
    @endforeach
</ul>