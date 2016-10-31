@if(sizeof($locales) > 1)
    <div class="c-header__lang-selector">
        <div class="sb-lang-selector">
            <div class="sb-lang-selector__button"></div>
            <ul class="sb-lang-selector__langs-list">
                @foreach($locales as $language)
                    <li>
                        <a href="/@if(!$language->is_default){{ $language->code }}@else/@endif">{{ $language->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif