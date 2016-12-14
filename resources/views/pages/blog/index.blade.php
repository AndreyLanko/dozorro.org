@extends('layouts/app')

@section('content')

    <div class="c-blog">
        <div class="container">
            <div class="row">

                <div class="col-md-9">
                    <div class="c-blog__left">

                        @if($main)
                            @include('partials.blog.post', ['post' => $main])
                        @endif

                        <div class="c-blog__news-list">

                            @foreach($posts as $post)
                                @if(!$post->is_main)
                                    @include('partials.blog.post')
                                @endif
                            @endforeach

                        </div>

                        <div class="c-blog__more-button">
                            <div class="sb-more-button">@lang('blog.load_more')</div>
                        </div>

                    </div>
                </div>

                @include('partials.blog.sidebar', ['banner' => $main])
            </div>
        </div>
    </div>

@endsection