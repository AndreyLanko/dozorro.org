<ul>
    @foreach($menu as $item)
        <li class="@if($item->active) active @endif">
            <a href="{{ \App\Helpers::getLocalizedUrl($item->url) }}">{{ $item->title }}</a>
            @if (sizeof($item->children()) > 0)
                @include('partials.menu', [
                    'menu' => $item->children(),
                    'depth' => ($item->nest_depth + 1),
                ])
            @endif
        </li>
    @endforeach
</ul>