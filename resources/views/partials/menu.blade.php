@if(!empty($menu))
    <div class="c-header__nav-wrap nav-header">
        <ul class="c-header__nav-list menu-header">
            <li class="parent">
                <a href="#">Меню с вложеностью</a>
                <ul class="drop-menu">
                    <li><a href="#">Про мониторинг</a></li>
                    <li><a href="#">Оскарження</a></li>
                    <li><a href="#">ЗрадоПеремоги</a></li>
                    <li><a href="#">Dozorro спільнота</a></li>
                </ul>
            </li>
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