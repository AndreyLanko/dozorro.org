@if (isset($data->image))
    <div>
        <img src="{{ env('BACKEND_URL') }}/{{ $data->image->path }}">
    </div>
@endif

{{--@if(isset($data->images))--}}
    {{--@foreach($data->images as $image)--}}
        {{--<div>--}}
            {{--<img src="{{ env('BACKEND_URL') }}/{{ $image->path }}">--}}
        {{--</div>--}}
    {{--@endforeach--}}
{{--@endif--}}