@extends('layouts/app')

@section('content')
    <div class="c-blog">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="c-blog__left">
                        <div class="c-one-new">
                            @include('partials.blog.full_post')

                            <div class="c-one-new__content">
                                @foreach($blocks as $block)
                                    @include('partials.longread.' . $block->alias, [
                                        'data' => $block->value
                                    ])
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @include('partials.blog.sidebar', ['latest_posts' => $latest_posts])
            </div>
        </div>
    </div>
@endsection