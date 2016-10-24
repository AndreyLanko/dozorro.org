@if (isset($seo))
    <title>{{ $seo->title }}</title>
    <meta name="description" content="{{ $seo->description }}" />
    <meta name="keywords" content="{{ $seo->keywords }}" />
    @if($seo->canonical)
        <link href="{{$seo->canonical}}" rel="canonical" />
    @endif
    @if($seo->meta_tags)
        {!!$seo->meta_tags!!}
    @endif
    <meta property="og:title" content="{{ $seo->og_title }}" />
    <meta property="og:url" content="{{ $seo->og_url }}" />
    <meta property="og:image" content="{{ $seo->og_image }}" />
    <meta property="og:description" content="{{ $seo->og_description }}" />
@endif