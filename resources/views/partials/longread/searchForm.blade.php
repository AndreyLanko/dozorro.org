@if(!empty($data->search_is_short))
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
    <script>

        $('.jsTenderTabs .tender-tabs__item').click(function() {
            var index=$(this).index('.tender-tabs__item');
            $('[tab-content]').hide();
            $('[tab-content]').eq(index).show();
            $('.jsTenderTabs .tender-tabs__item').removeClass('is-show');

            $(this).addClass('is-show');
        });

        $('.tender-header__link').click(function( event ) {
            event.preventDefault();
            $('.add-review-form').popup({
                transition: 'all 0.3s'
            });
        });

        $('.jsGetInputVal').change(function() {

            if($(this).val().length >= 1) {
                $(this).addClass('with-text');
            } else {
                $(this).removeClass('with-text');
            }
        });

        $(document).ready(function(){
            $(".tender-header__review-button").sticky({topSpacing:20});
            $(".tender-tabs-wrapper").sticky({topSpacing:0});
        });

    </script>

@else
    <div class="search-form">
        <div class="main-search">
            <div class="container">
                <div class="search-form--category">
                    <ul class="nav navbar-nav inline-navbar">
                        <li><a @if ($search_type=='tender') class="active"@endif href="/tender/search/">{{trans('form.tenders')}}</a></li>
                        <li><a @if ($search_type=='plan') class="active"@endif href="/plan/search/">{{trans('form.plans')}}</a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
    
                <div class="blocks-wr">
                    <div id="blocks" class="blocks clearfix">
                        <input id="query" class="query_input no_blocks" type="text" autocomplete="off" data-js="form" data-type="{{$search_type}}" data-lang="{{Config::get('locales.href')}}" data-no-results="{{Config::get('form.no_results')}}" data-buttons="{{Config::get('prozorro.buttons.'.$search_type)}}" data-placeholder="{{trans('form.placeholder')}}"@if (!empty($preselected_values)) data-preselected='{{$preselected_values}}'@endif @if (!empty($preselected_values)) data-highlight='{{$highlight}}'@endif>
                        <button id="search_button" class="more" disabled></button>
                    </div>
                    <div id="suggest" class="suggest"></div>
                </div>
                <div class="search-form--filter mob-visible none-important" mobile-totals>
                    <div class="result-all"><a href="" class="result-all-link">{{trans('form.resuts_found')}} <span></span>. {{trans('form.resuts_show')}}</a></div>
                </div>
                <div class="search-form--add-cryteria">
                    <div class="nav navbar-nav inline-navbar">
                        <div id="buttons" class="buttons"></div>
                    </div>
                    <a id="print-list" href="" target="_blank" class="none pull-right">Друкувати форму</a>
                </div>
            </div>
        </div>
        <div class="main-result" data-js="search_result">
            <div id="result" class="result">
                @if (!empty($result))
                    {!!$result!!}
                @endif
            </div>
        </div>
    </div>
    
    <script id="helper-suggest" type="text/x-jquery-tmpl">
    <div class="none"><a href>{name}: <span class="highlight">{value}</span></a></div>
    </script>
    
    <script id="helper-button" type="text/x-jquery-tmpl">
    <button>{name}</button>
    </script>
    
    <script id="block-query" type="text/x-jquery-tmpl" data-suggest-name="{{trans('form.keyword')}}" data-button-name="{{trans('form.keyword_short')}}">
    <div class="block block-query"><span class="block-key">{{trans('form.keyword_short')}}</span><input type="text" value="{value}"></div>
    </script>
    
    <script id="block-cpv" type="text/x-jquery-tmpl" data-suggest-name="{{trans('form.cpv')}}" data-button-name="{{trans('form.cpv')}}">
    <div class="block block-cpv"><button class="none">{{trans('form.choose')}}&nbsp;(<span></span>)</button><span class="block-key">{{trans('form.cpv')}}</span><select /></div>
    </script>
    
    <script id="block-dkpp" type="text/x-jquery-tmpl" data-suggest-name="{{trans('form.dkpp')}}" data-button-name="{{trans('form.dkpp')}}">
    <div class="block block-dkpp"><button class="none">{{trans('form.choose')}}&nbsp;(<span></span>)</button><span class="block-key">{{trans('form.dkpp')}}</span><select /></div>
    </script>
    
    <script id="block-date" type="text/x-jquery-tmpl" data-types='{!!json_encode(trans('form.date_types'), JSON_UNESCAPED_UNICODE)!!}' data-button-name="{{trans('form.date')}}">
    <div class="block block-date dateselect"><a href class="block-date-arrow"></a><div class="block-date-tooltip"></div><span class="block-key"></span><div class="block-date-picker"><input class="date start" type="text">—<input class="date end" class="text"></div></div>
    </script>
    
    <script id="block-dateplan" type="text/x-jquery-tmpl" data-types='{!!json_encode(trans('form.date_types_plan'), JSON_UNESCAPED_UNICODE)!!}' data-button-name="{{trans('form.date')}}">
    <div class="block block-date dateselect"><a href class="block-date-arrow"></a><div class="block-date-tooltip"></div><span class="block-key"></span><div class="block-date-picker"><input class="date start" type="text">—<input class="date end" class="text"></div></div>
    </script>
    
    <script id="block-edrpou" type="text/x-jquery-tmpl" data-suggest-name="{{trans('form.customer')}}" data-button-name="{{trans('form.customer')}}">
    <div class="block block-edrpou"><span class="block-key">{{trans('form.customer')}}</span><select /></div>
    </script>
    
    <script id="block-region" type="text/x-jquery-tmpl" data-suggest-name="{{trans('form.region')}}" data-button-name="{{trans('form.region')}}">
    <div class="block block-region"><span class="block-key">{{trans('form.region')}}</span><select /></div>
    </script>
    
    <script id="block-procedure_p" type="text/x-jquery-tmpl" data-suggest-name="{{trans('form.procedure_p')}}" data-button-name="{{trans('form.type')}}">
    <div class="block block-procedure_p"><span class="block-key">{{trans('form.procedure_p')}}</span><select /></div>
    </script>
    
    <script id="block-procedure_t" type="text/x-jquery-tmpl" data-suggest-name="{{trans('form.procedure_t')}}" data-button-name="{{trans('form.type')}}">
    <div class="block block-procedure_t"><span class="block-key">{{trans('form.procedure_t')}}</span><select /></div>
    </script>
    
    <script id="block-status" type="text/x-jquery-tmpl" data-suggest-name="{{trans('form.status')}}" data-button-name="{{trans('form.status')}}">
    <div class="block block-status"><span class="block-key">{{trans('form.status')}}</span><select /></div>
    </script>
    
    <script id="block-tid" type="text/x-jquery-tmpl" data-suggest-name="{{trans('form.tenderid')}}" data-button-name="{{trans('form.tenderid')}}">
    <div class="block block-tid"><span class="block-key">{{trans('form.tenderid')}}</span><input type="text" value="{value}"></div>
    </script>
    
    <script id="block-pid" type="text/x-jquery-tmpl" data-suggest-name="{{trans('form.planid')}}" data-button-name="{{trans('form.planid')}}">
    <div class="block block-tid"><span class="block-key">{{trans('form.planid')}}</span><input type="text" value="{value}"></div>
    </script>
@endif