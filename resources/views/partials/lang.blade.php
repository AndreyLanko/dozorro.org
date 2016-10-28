@if(sizeof($locales) > 1)
    <ul>
        @foreach($locales as $language)
            <li>
                <a href="/@if(!$language->is_default){{ $language->code }}@endif">
                    {{ $language->name }}
                </a>
            </li>
        @endforeach
    </ul>
@endif