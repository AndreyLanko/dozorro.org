<div class="c-n">
    <div class="container">
        <div class="c-n__list">
            @foreach($block->data['articles'] as $article)
                @include('partials.blog.post2')
            @endforeach
        </div>
        {{--
        <div class="c-n__more-button">
            <div class="sb-more-button">@lang('blog.load_more')</div>
        </div>
        --}}
    </div>
</div>