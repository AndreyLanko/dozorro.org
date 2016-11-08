@if (!empty($data->images))
    <div class="c-main-slider">
        <div class="c-main-slider__slider jsMainSlider">
            @foreach($data->images as $image)
                <div class="c-main-slider__slide" style="background-image: url('{{env('BACKEND_URL')}}{{ $image->path }}');">
                    <div class="c-main-slider__slide-bgcolor c-main-slider__slide-bgcolor--opacity-05">
                        <div class="container">
                            <div class="c-main-slider__table">
                                <div class="c-main-slider__cell">
                                    @if(!empty($image->title))
                                        <h1>{{ $image->title }}</h1>
                                    @endif
                                    @if(!empty($image->description))                                    
                                        <p>{{ $image->description }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif

<script>
    window.onload = function () {
        $('.jsMainSlider').slick({
            dots: true,
            autoplay: '{{ $data->is_autoplay }}'
        });
    }
</script>