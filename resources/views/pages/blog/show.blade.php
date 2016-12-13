@extends('layouts/app')

@section('content')

    <div class="c-blog">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="c-blog__left">
                        <div class="c-blog__news-list">

                            @include('partials.blog.full_post')
                            @foreach($blocks as $block)
                                @include('partials.longread.' . $block->alias, [
                                    'data' => $block->value
                                ])
                            @endforeach

                        </div>

                    </div>
                </div>

                @include('partials.blog.sidebar', ['latest_posts' => $latest_posts])

            </div>
        </div>
    </div>

@endsection