@if(!empty($menu))
    <ul @if ($depth == 0) class="c-header__nav-list menu-header" @else class="drop-menu" @endif>
        @foreach($menu as $item)
            <li @if ($item->nest_depth == 0 && sizeof($item->children()) > 0) class="parent" @endif>
                <a href="{{ \App\Helpers::getLocalizedUrl($item->url) }}"@if($item->active) class="is-active"@endif>{{ $item->title }}</a>
                @if (sizeof($item->children()) > 0)
                    @include('partials.menu', [
                        'menu' => $item->children(),
                        'depth' => ($depth + 1),
                    ])
                @endif
            </li>
        @endforeach
    </ul>
@endif