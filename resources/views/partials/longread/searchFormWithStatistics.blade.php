<div class="c-t">
    <div class="container">
        <form class="sb-s" action="/tender/search/" id="c-find-form" novalidate="novalidate">
            <div class="row">
                <div class="col-md-3">
                    @if (!empty($data->search_form_title))
                        <p class="sb-s__h">{{ $data->search_form_title }}</p>
                    @endif
                </div>
                <div class="col-md-6 clearfix" data-js="disableSearchButton">
                    <div class="sb-s__input sb-s__input--left">
                        <input id="tender-number" type="text" name="tid" class="jsGetInputVal" autocomplete="off" placeholder="UA-2016-01-01-000001">
                        <div class="sb-s__or">@lang('search.or')</div>
                    </div>
                    <div class="sb-s__input sb-s__input--right">
                        <input id="tender-customer" type="text" name="edrpou" class="jsGetInputVal" autocomplete="off" placeholder="@lang('search.customer')" data-js="customer_search">
                    </div>
                    <div id="errordiv" style="z-index: 9;color: black;"></div>
                </div>
                <div class="col-md-3 clearfix">
                    <input id="btn-find" type="submit" value="@lang('search.search_something')" disabled="">
                </div>
            </div>
        </form>


    </div>
    <div class="c-t__bgimg" style="background-image: url('/assets/images/c-t/c/c-t-bgimg.jpg');"></div>
</div>




@if(!empty($block->data['stats']) && ($block->data['stats']->tenders_sum !== '' || $block->data['stats']->violation_sum  !== '' || $block->data['stats']->comments !== '' || $block->data['stats']->reviews !== ''))
    <div class="block_statistic">
        <div class="container">
            <div class="row ">
                @if($block->data['stats']->tenders_sum !== '')
                    <div class="col-md-3 col-xs-6 item">

                            <div class="img-holder">
                                <img src="/assets/images/icon/icon-statistic1.png">
                            </div>
                            <div class="text_statistic">
                                <div class="number_statistic">
                                    <span>{{ $block->data['stats']->tenders_sum }}</span>
                                    @if($block->data['stats']->tenders_sum_text !== '')
                                        <span class="comment_statistic">{{ $block->data['stats']->tenders_sum_text }}</span>
                                    @endif
                                </div>

                                <div class="name_statistic">Ризикуємо втратити</div>
                            </div>


                            {{--<div class="sb-t__row">
                                <a href="#" class="sb-t__button">@lang('search.best_company')</a>
                            </div>--}}

                    </div>
                @endif
                @if($block->data['stats']->violation_sum !== '')
                    <div class="col-md-3 col-xs-6 item">

                        <div class="img-holder">
                            <img src="/assets/images/icon/icon-statistic2.png">
                        </div>
                        <div class="text_statistic">
                            <div class="number_statistic">
                                <span>{{ $block->data['stats']->violation_sum }}</span>
                                @if($block->data['stats']->violation_sum_text !== '')
                                    <span class="comment_statistic">{{ $block->data['stats']->violation_sum_text }}</span>
                                @endif
                            </div>

                            <div class="name_statistic">Ризикуємо втратити</div>
                        </div>

                        {{--<div class="sb-t__row">
                            <a href="#" class="sb-t__button">@lang('search.best_company')</a>
                        </div>--}}

                    </div>
                @endif
                @if($block->data['stats']->comments !== '')
                    <div class="col-md-3 col-xs-6 item">

                        <div class="img-holder">
                            <img src="/assets/images/icon/icon-statistic3.png">
                        </div>
                        <div class="text_statistic">
                            <div class="number_statistic">
                                <span>{{ $block->data['stats']->comments }}</span>
                            </div>

                            <div class="name_statistic">@lang('search.comments')</div>
                        </div>
                        {{--<div class="sb-t__row">
                            <a href="#" class="sb-t__button">@lang('search.best_company')</a>
                        </div>--}}

                    </div>
                @endif
                @if($block->data['stats']->reviews !== '')
                    <div class="col-md-3 col-xs-6 item">

                        <div class="img-holder">
                            <img src="/assets/images/icon/icon-statistic4.png">
                        </div>
                        <div class="text_statistic">
                            <div class="number_statistic">
                                <span>{{ $block->data['stats']->reviews }}</span>
                            </div>

                            <div class="name_statistic">@lang('search.reviews')</div>
                        </div>
                        {{--<div class="sb-t__row">
                            <a href="#" class="sb-t__button">@lang('search.best_company')</a>
                        </div>--}}

                    </div>
                @endif
            </div>
        </div>
    </div>
@endif