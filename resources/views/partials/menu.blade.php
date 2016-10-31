@if(!empty($menu))
    <div class="c-header__nav-wrap">
        <ul class="c-header__nav-list">
            @foreach($menu as $item)
                <li>
                    <a href="{{ \App\Helpers::getLocalizedUrl($item->url) }}"@if($item->active) class="is-active"@endif>{{ $item->title }}</a>
                    @if (sizeof($item->children()) > 0)
                        @include('partials.menu', [
                            'menu' => $item->children(),
                            'depth' => ($item->nest_depth + 1),
                        ])
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
@endif