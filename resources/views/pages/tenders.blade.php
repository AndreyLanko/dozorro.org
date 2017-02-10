@extends('layouts.app')

@section('content')

<div class="c-b">
    <div class="container">
        <div class="tender_customer">
            <div class="inline-layout">
                <div class="img-holder mobile">
                    <img src="assets/images/t-logo.svg" alt="@lang('tenders.logo_alt')">
                </div>
                <div class="info_tender_customer">
                    <h3>@lang('tenders.text_info_customer')</h3>
                    <div class="info_customer">
                        <div class="item inline-layout">
                            <div class="name">@lang('tenders.tenders_count')</div>
                            <div class="value">13</div>
                        </div>
                        <div class="item inline-layout">
                            <div class="name">@lang('tenders.tenders_sum')</div>
                            <div class="value">234 000 211 000 грн.</div>
                        </div>
                        <div class="item inline-layout">
                            <div class="name">@lang('tenders.tenders_reviews')</div>
                            <div class="value">234</div>
                        </div>
                    </div>
                </div>
                <div class="img-holder">
                    <img src="assets/images/t-logo.svg" alt="@lang('tenders.logo_alt')">
                </div>
            </div>
        </div>


        <div class="filter_tender">
            <h4 class="js-filter-tender"><span>@lang('tenders.form.search_title')</span></h4>
            <form class="inline-layout" action="/tenders" method="get">

                <div class="form-group">
                    <label for="number_tender">@lang('tenders.form.number')</label>
                    <div class="input_number_tender"><input value="{{ app('request')->input('tid') }}" type="text" id="number_tender" name="tid" placeholder="@lang('tenders.number_placeholder')"></div>
                </div>

                <div class="form-group">
                    <label for="">@lang('tenders.form.sum')</label>
                    <div class="inline-layout">
                        <div class="input_price_from"><input value="{{ app('request')->input('price_from') }}" type="text" id="price_from" name="price_from" placeholder=""></div>
                        <span>—</span>
                        <div class="input_price_before"><input value="{{ app('request')->input('price_to') }}" type="text" id="price_before" name="price_to" placeholder=""></div>
                    </div>

                </div>
                <div class="form-group">
                    <label for="tender-customer">@lang('tenders.form.customer')</label>
                    <input value="{{ $customer ? $customer['value'] : '' }}" id="tender-customer" type="text" name="edrpou" class="jsGetInputVal" autocomplete="off" placeholder="@lang('tenders.form.customer_placeholder')" data-js="customer_search">
                </div>
                <div class="form-group">
                    <label for="">@lang('tenders.form.violation')</label>
                    <select name="">
                        <option value="">@lang('tenders.form.violation_choose')</option>
                        <option value="1">Варіант 1</option>
                        <option value="2">Варіант 2</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status_tender">@lang('tenders.form.status')</label>
                    <select id="status_tender" name="status">
                        <option value="">@lang('tenders.form.status_choose')</option>
                        @foreach($dataStatus as $id => $status)
                            <option @if(app('request')->input('status') == $id) selected @endif value="{{ $id }}">{{ $status }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="object_tender">@lang('tenders.form.subject')</label>
                    <input value="{{ app('request')->input('cpv') }}" type="text" id="object_tender" name="cpv" placeholder="">
                </div>
                <div class="form-group">
                    <button>@lang('tenders.form.submit')</button>
                </div>

            </form>
        </div>


        <div class="list_tender_company">
            <h4>@lang('tenders.result.company_tenders')</h4>
            <div class="overflow-table">
                <table>
                    <tr>
                        <th>@lang('tenders.result.last_review')</th>
                        <th width="25%"><a class="order_up" href="#">@lang('tenders.result.id')</a></th>
                        <th width="15%">@lang('tenders.result.customer')</th>
                        <th width="12%">@lang('tenders.result.sum')</th>
                        <th>@lang('tenders.result.reviews')</th>
                        <th>@lang('tenders.result.status')</th>
                        <th width="15%">@lang('tenders.result.violation')</th>
                        <th>@lang('tenders.result.reaction')</th>
                        <th>@lang('tenders.result.organization')</th>
                    </tr>

                    @foreach ($tenders as $item)
                        @include('partials._search_tender', ['tender' => $item, 'item' => $item->get_tender_json(), 'for_mobile' => false])
                    @endforeach

                </table>
            </div>


        </div>
        <div class="list_tender_company mobile">

            <table>
                <tr>
                    <th>@lang('tenders.result.last_review')</th>
                    <th width="80%"><a class="order_up" href="#">@lang('tenders.result.id')</a></th>
                </tr>
                @foreach ($tenders as $item)
                    @include('partials._search_tender', ['tender' => $item, 'item' => $item->get_tender_json(), 'for_mobile' => true])
                @endforeach
            </table>

        </div>
    </div>

    <div class="link_pagination">@lang('tenders.show_more')</div>

</div>

@endsection