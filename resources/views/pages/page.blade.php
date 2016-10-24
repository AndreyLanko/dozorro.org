@extends('layouts.app')

@section('content')
    @foreach($blocks as $block)
        @include('partials.longread.' . $block->alias, [
            'data' => $block->value
        ])
    @endforeach
@endsection