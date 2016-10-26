<ul>
    @foreach($menu as $item)
        <li>
            <a href="{{ $item->url }}">{{ $item->title }}</a>
            @if (sizeof($item->children()) > 0)
                @include('partials.menu', [
                    'menu' => $item->children(),
                    'depth' => ($item->nest_depth + 1),
                ])
            @endif
        </li>
    @endforeach
</ul>