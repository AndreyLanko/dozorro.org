@if($post)
<div class="c-blog__main-new">
    <div class="sb-new-card sb-new-card--big-card">
        <a href="{{ route('page.blog.post', ['slug' => $post->slug]) }}" class="sb-new-card__img">
            <div class="sb-b__bgimg" style="background-image: url('{{ $post->photo() }}');"></div>
            @if($post->group)<a href="javascript:;" class="sb-b__tag" style="z-index: 1;">{{ $post->group }}</a>@endif
        </a>
        <div class="sb-new-card__content-wrap">
            <div class="sb-new-card__row">
                <a href="{{ route('page.blog.by_author', ['slug' => $post->author->slug]) }}" class="sb-new-card__author">{{ $post->author->full_name }}</a>
                <ul class="sb-new-card__tags-list">
                    @foreach($post->tags as $tag)
                        <li><a href="{{ route('page.blog.by_tag', ['slug' => $tag->slug ]) }}">{{ $tag->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="sb-new-card__row">
                <h2><a href="{{ route('page.blog.post', ['slug' => $post->slug]) }}">{{ $post->title }}</a></h2>
                <h3>{!! $post->short_description !!}</h3>
            </div>
            <div class="">
                <div class="">
                    @if($post->budget)<div class="sb-b__info">@lang('blog.budget', ['budget' => $post->budget])</div>@endif
                    @if($post->sum)<div class="sb-b__info">@lang('blog.sum', ['sum' => $post->sum])</div>@endif
                    @if($post->saving)<div class="sb-b__info">@lang('blog.saving', ['saving' => $post->saving])</div>@endif
                </div>
            </div>
            <div class="sb-new-card__row">
                <div class="sb-new-card__date">@datetime($post->published_at)</div>
                {{--<a href="#" class="sb-new-card__comments">0</a>--}}
            </div>
        </div>
    </div>
</div>
@endif