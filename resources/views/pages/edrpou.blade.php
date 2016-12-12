@extends('layouts.app')

@section('content')
    <div class="search-form">
        <div class="main-result" data-js="search_result">	
    		<div id="result" class="result">
        		<div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="search-form--filter mob-hide">
                                <div class="result-all">Знайдено: <span>{{ sizeof($items) }}</span></div>
                            </div>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
        		</div>
            
                @foreach ($items as $item)
                    <div class="items-list">
                    	<div class="container">
                    		<div class="items-list--item clearfix">
                    			<div class="row clearfix">
                    				<div class="col-md-8">
                                        <a href="/tender/{{$item->tenderID}}/" class="items-list--header"><span class="cell">{{!empty($item->title) ? $item->title : trans('facebook.tender_no_name')}}</span></a>
                    					<div class="clearfix"></div>
                    					<ol class="breadcrumb">
                    						@if (!empty($item->procuringEntity->address->locality))
                    							<li>{{$item->procuringEntity->address->locality}}</li>
                    						@endif
                    					</ol>
                    					@if (!empty($item->description))
                    						<div class="description-wr{{mb_strlen($item->description)>350?' croped':' open'}}">
                    							@if ($item->description)
                    								<div class="description"><p>{{$item->description}}</p></div>
                    							@endif
                    							@if (mb_strlen($item->description)>350)
                    								<a class="search-form--open" href="">
                    									<i class="sprite-arrow-right"></i>
                    									<span>{{trans('interface.expand')}}</span>
                    									<span>{{trans('interface.collapse')}}</span>
                    								</a>
                    							@endif
                    						</div>
                    					@endif
                    					@if (!empty($item->procuringEntity->name))
                    						<div class="items-list-item-description">
                    							<strong>{{trans('interface.company')}}:</strong> {{$item->procuringEntity->name}}
                    						</div>
                    					@endif
                    					<div class="items-list--tem-id"><strong>ID:</strong> {{$item->tenderID}}</div>
                    				</div>
                    				<div class="col-md-4 relative">	
                    					<div class="items-list--item--price">
                    						<span class="price-description">{{trans('tender.wait_sum')}}</span>
                    						{{number_format($item->value->amount, 0, '', ' ')}}
                    						<span class="uah">{{$item->value->currency}}</span>
                    					</div>
                    					@if (!empty($item->enquiryPeriod->startDate))
                    						<div class="items-list--item--date"><strong>{{trans('tender.start_date')}}:</strong> {{date('d.m.Y', strtotime($item->enquiryPeriod->startDate))}}</div>
                    					@endif
                    				</div>
                    			</div>
                    		</div>
                    	</div>
                    </div>
                @endforeach
    		</div>
        </div>
    </div>
@endsection