@if($post)
<div class="c-blog__news-item">
    <div class="sb-new-card">
        <a href="{{ route('page.blog.post', ['slug' => $post->slug]) }}" class="sb-new-card__img">
            <img src="{{ $post->photo() }}" width="430" height="225">
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
            <div class="sb-new-card__row">
                <div class="sb-new-card__date">@datetime($post->published_at)</div>
                <a href="#" class="sb-new-card__comments">0</a>
            </div>
        </div>
    </div>
</div>
@endif