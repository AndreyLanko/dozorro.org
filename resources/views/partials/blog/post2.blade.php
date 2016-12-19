@if($article)
<div class="c-n__item">

    <div class="sb-new-card">
        <div class="sb-new-card__top-img">
            <a href="{{ route('page.blog.post', ['slug' => $article->slug]) }}" class="sb-new-card__img">
                <img src="{{ $article->photo() }}" width="430" height="225">
            </a>
            @if($article->group)<a href="#sb-new-top" class="sb-new-card__color-tag">{{ $article->group }}</a>@endif
            <div class="sb-new-card__info-wrap">
                @if($article->budget)<div>@lang('blog.budget', ['budget' => $article->budget])</div>@endif
                @if($article->sum)<div>@lang('blog.sum', ['sum' => $article->sum])</div>@endif
                @if($article->saving)<div>@lang('blog.saving', ['saving' => $article->saving])</div>@endif
            </div>
        </div>

        <div class="sb-new-card__content-wrap">

            <div class="sb-new-card__row">
                <h2><a href="{{ route('page.blog.post', ['slug' => $article->slug]) }}">{{ $article->title }}</a></h2>
            </div>

            <div class="sb-new-card__row">
                <div class="sb-new-card__date">@datetime($article->published_at)</div>
            </div>

        </div>
    </div>

</div>
@endif