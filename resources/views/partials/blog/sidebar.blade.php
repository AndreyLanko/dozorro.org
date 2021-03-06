<div class="col-md-3">
    <div class="c-blog__right">

        @if(!empty($latest_posts))
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
        @endif

        @if($banner)
            <a href="{{ route('page.blog.post', ['slug' => $banner->slug]) }}" class="sb-v">
                <div class="sb-v__bg-img" style="background-image: url('{{ $banner->photo() }}');"></div>
                <h2>{{ $banner->title }}</h2>
                <h3>{{ $banner->author->full_name }}</h3>
            </a>
        @endif

        @if($tenders)
        <div class="c-list-card">
            <div class="c-list-card__inner">
                <h3 class="c-list-card__header">@lang('blog.active_tenders')</h3>
                <div class="c-list-card__cards">

                    @foreach($tenders AS $_tender)
                        <?php $tender = $_tender->get_format_data(); ?>
                        @if(isset($tender->tenderID))
                            <div class="sb-list-item">
                                <div class="sb-list-item__row">
                                    <h2><a href="{{ route('page.tender_by_id', ['id' => $tender->tenderID]) }}">{{ $tender->title }}</a></h2>
                                </div>
                                <div class="sb-list-item__row">
                                    <a href="{{ route('page.tender_by_id', ['id' => $tender->tenderID]) }}" class="sb-list-item__stat">{{ $tender->status }}</a>
                                    <a href="{{ route('page.tender_by_id', ['id' => $tender->tenderID]) }}" class="sb-list-item__comments">{{ $_tender->comments }}</a>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>
                <div class="c-list-card__link-wrap">
                    <a href="/tender/search/">@lang('blog.all_tenders')</a>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>