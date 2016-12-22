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

        @if(!empty($block->data['stats']) && ($block->data['stats']->tenders_sum !== '' || $block->data['stats']->violation_sum  !== '' || $block->data['stats']->comments !== '' || $block->data['stats']->reviews !== ''))
            <div class="row c-t__cards">
                @if($block->data['stats']->tenders_sum !== '')
                    <div class="col-md-3">
                        <div class="sb-t">
                            <div class="sb-t__row">
                                <div class="sb-t__img">
                                    <img src="/assets/images/c-t/d/c-t-a.png">
                                </div>
                            </div>
                            <div class="sb-t__row">
                                <div class="sb-t__c">{{ $block->data['stats']->tenders_sum }}<div class="sb-t__ca">{{ $block->data['stats']->tenders_sum_text }}</div></div>
                            </div>
                            <div class="sb-t__row">
                                <div class="sb-t__d">Ризикуємо втратити</div>
                            </div>
                            {{--<div class="sb-t__row">
                                <a href="#" class="sb-t__button">@lang('search.best_company')</a>
                            </div>--}}
                        </div>
                    </div>
                @endif
                @if($block->data['stats']->violation_sum !== '')
                    <div class="col-md-3">
                        <div class="sb-t">
                            <div class="sb-t__row">
                                <div class="sb-t__img">
                                    <img src="/assets/images/c-t/d/c-t-b.png">
                                </div>
                            </div>
                            <div class="sb-t__row">
                                <div class="sb-t__c">{{ $block->data['stats']->violation_sum }}<div class="sb-t__ca">{{ $block->data['stats']->violation_sum_text }}</div></div>
                            </div>
                            <div class="sb-t__row">
                                <div class="sb-t__d">Сумнівних тендерів</div>
                            </div>
                            {{--<div class="sb-t__row">
                                <a href="#" class="sb-t__button">@lang('search.bad_company')</a>
                            </div>--}}
                        </div>
                    </div>
                @endif
                @if($block->data['stats']->comments !== '')
                    <div class="col-md-3">
                        <div class="sb-t">
                            <div class="sb-t__row">
                                <div class="sb-t__img">
                                    <img src="/assets/images/c-t/d/c-t-c.png">
                                </div>
                            </div>
                            <div class="sb-t__row">
                                <div class="sb-t__c">{{ $block->data['stats']->comments }}</div>
                            </div>
                            <div class="sb-t__row">
                                <div class="sb-t__d">@lang('search.comments')</div>
                            </div>
                            {{--<div class="sb-t__row">
                                <a href="#" class="sb-t__button">@lang('search.more_comments')</a>
                            </div>--}}
                        </div>
                    </div>
                @endif
                @if($block->data['stats']->reviews !== '')
                    <div class="col-md-3">
                        <div class="sb-t">
                            <div class="sb-t__row">
                                <div class="sb-t__img">
                                    <img src="/assets/images/c-t/d/c-t-d.png">
                                </div>
                            </div>
                            <div class="sb-t__row">
                                <div class="sb-t__c">{{ $block->data['stats']->reviews }}</div>
                            </div>
                            <div class="sb-t__row">
                                <div class="sb-t__d">@lang('search.reviews')</div>
                            </div>
                            {{--<div class="sb-t__row">
                                <a href="#" class="sb-t__button">@lang('search.popular_tenders')</a>
                            </div>--}}
                        </div>
                    </div>
                @endif
            </div>
        @endif
    </div>
    <div class="c-t__bgimg" style="background-image: url('/assets/images/c-t/c/c-t-bgimg.jpg');"></div>
</div>