@extends('layouts/app')

@section('content')

<div homepage>
    @foreach($blocks as $block)
        @include('partials.longread.' . $block->alias, [
            'data' => $block->value
        ])
    @endforeach
</div>

@endsection