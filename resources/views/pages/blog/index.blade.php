@extends('layouts/app')

@section('content')

    <div class="c-blog">
        <div class="container">
            <div class="row">


                <div class="col-md-9">
                    <div class="c-blog__left">

                        @if($main)
                            @include('partials.blog.main_post', ['post' => $main])
                        @endif

                        @if(count($posts) > 0)
                        <div class="c-blog__news-list">

                            @foreach($posts as $post)
                                @if($post)
                                    @include('partials.blog.post')
                                @endif
                            @endforeach

                        </div>


                        <div class="c-blog__more-button">
                            <div class="sb-more-button">@lang('blog.load_more')</div>
                        </div>
                        @endif

                    </div>
                </div>

                @if($main)
                    @include('partials.blog.sidebar', ['banner' => $main])
                @endif
            </div>
        </div>
    </div>

@endsection