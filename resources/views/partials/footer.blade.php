<div class="c-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <p class="c-footer__copy">© 2016 Dozorro. Всі права захищено.</p>
            </div>
            <div class="col-md-6 c-footer__nav-col">
                @if(!empty($menu))
                    <ul class="c-footer__nav-list">
                        @foreach($menu as $item)
                            <li>
                                <a href="{{ \App\Helpers::getLocalizedUrl($item->url) }}"@if($item->active) class="is-active"@endif>{{ $item->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="col-md-3">
                
            </div>
        </div>
    </div>
</div>