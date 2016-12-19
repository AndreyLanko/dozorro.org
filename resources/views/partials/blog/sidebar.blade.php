<div class="col-md-3">
    <div class="c-blog__right">

        <div class="c-list-card">
            <div class="c-list-card__inner">
                <h3 class="c-list-card__header">@lang('blog.latest_news')</h3>
                <div class="c-list-card__cards">

                    @foreach($latest_posts AS $latest_post)
                        @if(!$latest_post->is_main)
                        <div class="sb-list-item">
                            <div class="sb-list-item__row">
                                <h2><a href="{{ route('page.blog.post', ['slug' => $latest_post->slug]) }}">{{ $latest_post->title }}</a></h2>
                            </div>
                            <div class="sb-list-item__row">
                                <div class="sb-list-item__date">@datetime($latest_post->published_at)</div>
                            </div>
                        </div>
                        @endif
                    @endforeach

                </div>
                <div class="c-list-card__link-wrap">
                    <a href="{{ route('page.blog') }}">@lang('blog.all_news')</a>
                </div>
            </div>
        </div>

        @if($banner)
        <a href="{{ route('page.blog.post', ['slug' => $banner->slug]) }}" class="sb-vert-banner">
            <img src="{{ $banner->photo() }}" width="280" height="410">
            <h2>{{ $banner->title }}</h2>
            <h3>{{ $banner->author->full_name }}</h3>
        </a>
        @endif

        @if($tenders)
        <div class="c-list-card">
            <div class="c-list-card__inner">
                <h3 class="c-list-card__header">@lang('blog.active_tenders')</h3>
                <div class="c-list-card__cards">

                    @foreach($tenders AS $tender)
                        @if($tender->get_format_data())
                            <div class="sb-list-item">
                                <div class="sb-list-item__row">
                                    <h2><a href="{{ route('page.tender_by_id', ['id' => $tender->get_format_data()->tenderID]) }}">{{ $tender->get_format_data()->title }}</a></h2>
                                    <h3>{{ $tender->get_format_data()->description }}</h3>
                                </div>
                                <div class="sb-list-item__row">
                                    <a href="#" class="sb-list-item__stat">@lang('blog.qualification')</a>
                                    <a href="#" class="sb-list-item__comments">0</a>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>
                <div class="c-list-card__link-wrap">
                    <a href="#">@lang('blog.all_tenders')</a>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>