@extends('layouts/app')

@section('head')
    @if ($item && !$error)
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="{{trans('facebook.site_name')}}">
        <meta property="og:title" content="{{htmlentities($item->procuringEntity->name, ENT_QUOTES)}}">
        <meta property="og:url" content="{{env('ROOT_URL')}}/{{Request::path()}}">
        <meta property="og:image" content="{{env('ROOT_URL')}}/assets/images/social/fb.png">
        <meta property="og:description" content="{{!empty($item->title) ? htmlentities($item->title, ENT_QUOTES) : trans('facebook.tender_no_name')}}">
    @endif
@endsection

@section('content')

    @if ($item && !$error)
        <div class="tender" data-js="tender">
            @include('partials/blocks/tender/header')
            
            <!-- tender-description -->
            <div class="tender-description">
                <div class="container">
                    <div class="tender-description__table">
                        <div class="tender-description__row">
                            <div class="tender-description__cell">
                                Найменування замовника:
                            </div>
                            <div class="tender-description__cell">
                                КП КЗО ПАВЛОГРАДСЬКИЙ НАВЧАЛЬНО-РЕАБІЛІТАЦІЙНИЙ ЦЕНТР ДОР"
                            </div>
                        </div>
                        <div class="tender-description__row">
                            <div class="tender-description__cell">
                                Код ЄДРПОУ:
                            </div>
                            <div class="tender-description__cell">
                                23067389
                            </div>
                        </div>
                        <div class="tender-description__row">
                            <div class="tender-description__cell">
                                Оцінка умов закупIв:
                            </div>
                            <div class="tender-description__cell">
                                <ul class="tender-stars tender-stars--4">
		                    			    <li></li><li></li><li></li><li></li><li></li>
	                    			    </ul>	
	                    			    <span class="text-gray text-small">(2 відгуки)</span>
                            </div>
                        </div>
                        <div class="tender-description__row">
                            <div class="tender-description__cell">
                                Оцінка рішення щодо вибору переможця:
                            </div>
                            <div class="tender-description__cell">
                                <ul class="tender-stars tender-stars--3">
		                    			    <li></li><li></li><li></li><li></li><li></li>
	                    			    </ul>	
	                    				  <span class="text-gray text-small">(1 відгук)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END tender-description -->
            
            <!-- tender-tabs -->
            <div class="tender-tabs jsTenderTabs">
                <div class="container">
	                  <div class="tender-tabs__wrap">
	                      <ul class="tender-tabs__buttons">
		                      <li><span class="tender-tabs__item jsShowReviews is-show">Відгуки</span></li>
		                      <li><span class="tender-tabs__item jsShowDescription">Інформація про тендер</span></li>
	                      </ul>
	                  </div>
                </div>
            </div>
            <!-- END tender-tabs -->
            
            <!-- reviews - Блок "Отзывы" 
	            Повторяющийся блок - "reviews__item".
	            Чтобы сделать ответ на отзыв, нужно к блоку "reviews__item" добавить один из классов:
	               "reviews__item--deep-1" - отступ слева 60px,    "reviews__item reviews__item--deep-1"
	               "reviews__item--deep-2" - отступ слева 120px    "reviews__item reviews__item--deep-2"
	            У элемента reviews__author есть следующие состояния:
	               "reviews__author" - автор без иконки
	               "reviews__author reviews__author--confirmed" - автор подтвержден, зеленая иконка
	               "reviews__author reviews__author--not-confirmed" - автор не подтвержден, серая иконка -->
            <div class="reviews is-show">
	            <div class="container">
		            <!-- reviews__item -->
		            <div class="reviews__item">
			              <div class="reviews__header">
				                <span class="reviews__author reviews__author--confirmed">(контактна інформація прихована)</span><span class="reveiw__date">15.08.2016</span>
			              </div>
			              <div class="reviews__body">
				                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est. Lorem ipsum dolor sit amet.</p>
			              </div>
			              <div class="reviews__footer">
				                <div class="reviews__stars">
					                  <h3>Умови закупівлі:</h3>
					                  
					                  <ul class="tender-stars tender-stars--3">
		                            <li></li><li></li><li></li><li></li><li></li>
	                          </ul>
					                  
				                </div>
				                <div class="reviews__stars">
					                  <h3>Вибор переможця:</h3>
					                  
					                  <ul class="tender-stars tender-stars--3">
		                            <li></li><li></li><li></li><li></li><li></li>
	                          </ul>
					                  
				                </div>
				                <div class="reviews__useful-rating">
					                  <h3>Відгук корисний для вас?</h3>
					                  
					                  <div class="reviews__useful-wrap">
						                    <span class="reviews__useful-moji"></span>
						                    <span class="reviews__useful-moji-rating-count">(15 оцінок)</span>
						                </div>
					                  
				                </div>
			              </div>
		            </div>
		            <!-- END reviews__item -->
		            <!-- reviews__item (answer) -->
		            <div class="reviews__item reviews__item--deep-1">
			              <div class="reviews__header">
				                <span class="reviews__author">Замовник</span>
			              </div>
			              <div class="reviews__body">
				                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est. Lorem ipsum dolor sit amet.</p>
			              </div>
			              <div class="reviews__footer">
				                <a href="#" class="reviews__more-button">Інші коментарі (27)</a>
			              </div>
		            </div>
		            <!-- END reviews__item (answer) -->
		            <!-- reviews__item (answer) -->
		            <div class="reviews__item reviews__item--deep-2">
			              <div class="reviews__header">
				                <span class="reviews__author">Замовник</span>
			              </div>
			              <div class="reviews__body">
				                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est. Lorem ipsum dolor sit amet.</p>
			              </div>
			              <div class="reviews__footer">
				                <a href="#" class="reviews__more-button">Інші коментарі (27)</a>
			              </div>
		            </div>
		            <!-- END reviews__item (answer) -->
		            <!-- reviews__item (answer) -->
		            <div class="reviews__item reviews__item--deep-1">
			              <div class="reviews__header">
				                <span class="reviews__author">Замовник</span>
			              </div>
			              <div class="reviews__body">
				                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est. Lorem ipsum dolor sit amet.</p>
			              </div>
			              <div class="reviews__footer">
				                <a href="#" class="reviews__more-button">Інші коментарі (27)</a>
			              </div>
		            </div>
		            <!-- END reviews__item (answer) -->
		            <!-- reviews__item -->
		            <div class="reviews__item">
			              <div class="reviews__header">
				                <span class="reviews__author reviews__author--not-confirmed">(контактна інформація прихована)</span><span class="reveiw__date">15.08.2016</span>
			              </div>
			              <div class="reviews__body">
				                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est. Lorem ipsum dolor sit amet.</p>
			              </div>
			              <div class="reviews__footer">
				                <div class="reviews__stars">
					                  <h3>Умови закупівлі:</h3>
					                  
					                  <ul class="tender-stars tender-stars--3">
		                            <li></li><li></li><li></li><li></li><li></li>
	                          </ul>
					                  
				                </div>
				                <div class="reviews__stars">
					                  <h3>Вибор переможця:</h3>
					                  
					                  <ul class="tender-stars tender-stars--3">
		                            <li></li><li></li><li></li><li></li><li></li>
	                          </ul>
					                  
				                </div>
				                <div class="reviews__useful-rating">
					                  <h3>Відгук корисний для вас?</h3>
					                  
					                  <div class="reviews__useful-wrap">
						                    <span class="reviews__useful-moji"></span>
						                    <span class="reviews__useful-moji-rating-count">(15 оцінок)</span>
						                </div>
					                  
				                </div>
			              </div>
		            </div>
		            <!-- END reviews__item -->
	            </div>
            </div>
            <!-- END reviews -->
            
            
            
            
            <div class="tender--description">
                <div class="container">
                            <div class="row">
                            <div class="col-sm-9">
                                @if(!empty($item->__open_name) && $item->__open_name!='hide')
                                    @if(!empty($item->__open_name))
                                        <h2>
                                            {!!$item->__open_name!!}
                                        </h2>
                                        @if(!empty($item->__stage2TenderID))
                                            <div style="margin-top:-35px;margin-bottom:60px">
                                                <a href="/tender/{{$item->__stage2TenderID}}">Перейти на 2-ий етап</a>
                                            </div>
                                        @endif
                                        @if(!empty($item->__stage1TenderID))
                                            <div style="margin-top:-35px;margin-bottom:60px">
                                                <a href="/tender/{{$item->__stage1TenderID}}">Перейти на 1-ий етап</a>
                                            </div>
                                        @endif
                                        @if(!empty($item->title_en))
                                            <div style="margin-top:-{{ !empty($item->__stage2TenderID) || !empty($item->__stage1TenderID) ? '55':'35' }}px;margin-bottom:60px">Tender notice</div>
                                        @endif
                                    @endif                 
                                    @if($item->__print_href && !in_array($item->procurementMethodType, ['negotiation', 'negotiation.quick']))
                                        @if(starts_with($item->__print_href, 'limited'))
                                            @if(empty($item->__active_award))
                                                <div style="margin-top:-30px;margin-bottom:40px">Для друку форми необхідно завершити дії на майданчику</div>
                                            @else
                                                <div style="margin-top:-30px;margin-bottom:40px">Друкувати форму оголошення <a href="{{href('tender/'.$item->tenderID.'/print/'.$item->__print_href.'/pdf')}}" target="_blank">PDF</a> ● <a href="{{href('tender/'.$item->tenderID.'/print/'.$item->__print_href.'/html')}}" target="_blank">HTML</a></div>
                                            @endif
                                        @else
                                            <div style="margin-top:-30px;margin-bottom:40px">Друкувати форму оголошення <a href="{{href('tender/'.$item->tenderID.'/print/'.$item->__print_href.'/pdf')}}" target="_blank">PDF</a> ● <a href="{{href('tender/'.$item->tenderID.'/print/'.$item->__print_href.'/html')}}" target="_blank">HTML</a></div>
                                        @endif
                                    @endif
                                    @if(!empty($item->__stage2TenderID))
                                        <div style="margin-top:-30px;margin-bottom:40px">Друкувати форму оголошення 2-го етапу <a href="{{href('tender/'.$item->__stage2TenderID.'/print/'.$item->__print_href.'/pdf')}}" target="_blank">PDF</a> ● <a href="{{href('tender/'.$item->__stage2TenderID.'/print/'.$item->__print_href.'/html')}}" target="_blank">HTML</a></div>
                                    @endif
                                    @if(!empty($item->__stage1TenderID))
                                        <div style="margin-top:-30px;margin-bottom:40px">Друкувати форму оголошення 1-го етапу <a href="{{href('tender/'.$item->__stage1TenderID.'/print/'.$item->__print_href.'/pdf')}}" target="_blank">PDF</a> ● <a href="{{href('tender/'.$item->__stage1TenderID.'/print/'.$item->__print_href.'/html')}}" target="_blank">HTML</a></div>
                                    @endif
                                @else
                                    @if ($item->procurementMethod == 'open' && in_array($item->procurementMethodType, ['aboveThresholdEU', 'competitiveDialogueEU', 'aboveThresholdUA.defense']))
                                        @if (Lang::getLocale() == 'en' )
                                            <h2>Tender notice</h2>
                                        @else
                                            <h2></h2>
                                        @endif
                                    @endif
                                @endif

                                @if ($item->__isSingleLot)
                                    @if(in_array($item->status, ['complete', 'unsuccessful', 'cancelled']) && $item->procurementMethod=='open' && in_array($item->procurementMethodType, ['aboveThresholdUA', 'aboveThresholdEU', 'aboveThresholdUA.defense']))
                                        <div style="margin-top:-30px;margin-bottom:40px">Друкувати звіт про результати проведення процедури <a href="{{href('tender/'.$item->tenderID.'/print/report/pdf')}}" target="_blank">PDF</a> ● <a href="{{href('tender/'.$item->tenderID.'/print/report/html')}}" target="_blank">HTML</a></div>
                                    @endif
                                    @if(in_array($item->status, ['complete', 'cancelled']) && $item->procurementMethod=='limited' && in_array($item->procurementMethodType, ['negotiation', 'negotiation.quick']))
                                        <div style="margin-top:-30px;margin-bottom:40px">Друкувати звіт про результати проведення процедури <a href="{{href('tender/'.$item->tenderID.'/print/report/pdf')}}" target="_blank">PDF</a> ● <a href="{{href('tender/'.$item->tenderID.'/print/report/html')}}" target="_blank">HTML</a></div>
                                    @endif
                                @endif
    
                                {{--Інформація про замовника--}}
                                @include('partials/blocks/tender/procuring-entity')
    
                                {{--Обгрунтування застосування переговорної процедури--}}
                                @include('partials/blocks/tender/negotiation')
                                
                                {{--Інформація про процедуру--}}
                                @include('partials/blocks/tender/dates')
    
                                {{--Інформація про предмет закупівлі--}}
                                @include('partials/blocks/tender/info')
    
                                <h2>Документація</h2>
    
                                {{--Критерії вибору переможця--}}
                                @include('partials/blocks/tender/criteria')
    
                                {{--Тендерна документація--}}
                                @include('partials/blocks/tender/documentation')
    
    
                                @if (!empty($item->__complaints_claims) ||!empty($item->__questions))
                                    <h2>Роз’яснення до процедури</h2>
    
                                    {{--Запитання до процедури--}}
                                    @include('partials/blocks/tender/questions')
        
                                    {{--Вимоги про усунення порушення--}}
                                    @include('partials/blocks/tender/claims')
    
                                @endif
    
                                {{--Скарги до процедури--}}
                                @include('partials/blocks/tender/complaints', ['title'=>'Скарги до процедури'])
    
                                @if (!$item->__isMultiLot)
    
                                    {{--Протокол розгляду--}}
                                    @include('partials/blocks/tender/qualifications')
    
                                    {{--Реєстр пропозицій--}}
                                    @include('partials/blocks/tender/bids')
    
                                    {{--Протокол розкриття--}}
                                    @include('partials/blocks/tender/awards')
                                    
                                    {{--Повідомлення про намір укласти договір--}}                
                                    @include('partials/blocks/tender/active-awards')                
    
                                    {{--Укладений договір--}}
                                    @include('partials/blocks/tender/contract')
                    
                                    {{--Зміни до договору--}}
                                    @include('partials/blocks/tender/contract-changes')
                
                                    {{--Виконання договору--}}
                                    @include('partials/blocks/tender/contract-ongoing')
                
                                    {{--Інформація про скасування--}}
                                    @include('partials/blocks/tender/cancelled', [
                                        'tenderPeriod'=>!empty($item->tenderPeriod) ? $item->tenderPeriod : false,
                                        'qualificationPeriod'=>!empty($item->qualificationPeriod) ? $item->qualificationPeriod : false
                                    ])
    
                                @endif
                            </div>
                        </div>
                    
                        </div>
                   
                    @if($item->__isMultiLot)
                        <h2>Лоти</h2>
                        <div class="bs-example bs-example-tabs lots-tabs wide-table" data-js="lot_tabs" data-tab-class="tab-lot-content">
                            <ul class="nav nav-tabs" role="tablist">
                                @foreach($item->lots as $k=>$lot)
                                    <li role="presentation" class="{{$k==0?'active':''}}" style="font-size:80%">
                                        <a href="" role="tab" data-toggle="tab" aria-expanded="{{$k==0?'true':'false'}}">{{ !empty($lot->lotNumber) ? $lot->lotNumber : str_limit((!empty($lot->title) ? $lot->title : 'Лот '.($k+1)), 20) }}{{--Лот {{$k+1}}--}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="lots-container">
                            @foreach($item->lots as $k=>$lot)
                                <div class="tab-content tab-lot-content{{$k==0?' active':''}}">
                                    {{--Опис--}}
                                    @include('partials/blocks/lots/info', [
                                        'item'=>$lot,
                                        'tender'=>$item
                                    ])

                                    @if(in_array($lot->status, ['complete', 'unsuccessful', 'cancelled']) && $item->procurementMethod=='open' && in_array($item->procurementMethodType, ['aboveThresholdUA', 'aboveThresholdEU', 'aboveThresholdUA.defense']))
                                        <div style="margin-top:-20px;margin-bottom:40px">Друкувати звіт про результати проведення процедури <a href="{{href('tender/'.$item->tenderID.'/print/report/pdf/'.$lot->id)}}" target="_blank">PDF</a> ● <a href="{{href('tender/'.$item->tenderID.'/print/report/html/'.$lot->id)}}" target="_blank">HTML</a></div>
                                    @endif
                                    @if(in_array($lot->status, ['complete', 'cancelled']) && $item->procurementMethod=='limited' && in_array($item->procurementMethodType, ['negotiation', 'negotiation.quick']))
                                        <div style="margin-top:-20px;margin-bottom:40px">Друкувати звіт про результати проведення процедури <a href="{{href('tender/'.$item->tenderID.'/print/report/pdf/'.$lot->id)}}" target="_blank">PDF</a> ● <a href="{{href('tender/'.$item->tenderID.'/print/report/html/'.$lot->id)}}" target="_blank">HTML</a></div>
                                    @endif
    
                                    {{--Позиції--}}
                                    @include('partials/blocks/lots/items', [
                                        'item'=>$lot
                                    ])
    
                                    {{--<h2>Документація</h2>--}}
    
                                    {{--Критерії вибору переможця--}}
                                    @include('partials/blocks/lots/criteria', [
                                        'item'=>$lot
                                    ])
    
                                    {{--Документація--}}
                                    @include('partials/blocks/tender/documentation',[
                                        'item'=>$lot,
                                        'lot_id'=>$lot->id
                                    ])
    
                                    {{--Запитання до лоту--}}
                                    @include('partials/blocks/tender/questions', [
                                        'item'=>$lot
                                    ])
                                    
                                    {{--Вимоги про усунення порушення до лоту--}}
                                    @include('partials/blocks/tender/claims', [
                                        'item'=>$lot
                                    ])
    
                                    {{--Скарги до лоту--}}
                                    @include('partials/blocks/tender/complaints', [
                                        'item'=>$lot,
                                        'title'=>'Скарги до лоту'
                                    ])
    
                                    {{--Протокол розгляду--}}
                                    @include('partials/blocks/tender/qualifications', [
                                        'item'=>$lot
                                    ])

                                    {{--Реєстр пропозицій--}}
                                    @include('partials/blocks/tender/bids', [
                                        'item'=>$lot
                                    ])
                                    
                                    {{--Протокол розкриття--}}
                                    @include('partials/blocks/tender/awards', [
                                        'item'=>$lot
                                    ])
    
                                    {{--Повідомлення про намір укласти договір--}}                
                                    @include('partials/blocks/tender/active-awards', [
                                        'item'=>$lot
                                    ])
    
                                    {{--Інформація про скасування--}}
                                    @include('partials/blocks/tender/cancelled', [
                                        'item'=>$lot,
                                        'tenderPeriod'=>!empty($item->tenderPeriod) ? $item->tenderPeriod : false,
                                        'qualificationPeriod'=>!empty($item->qualificationPeriod) ? $item->qualificationPeriod : false
                                    ])
                                    
                                    {{--Укладений договір--}}
                                    @include('partials/blocks/tender/contract', [
                                        'item'=>$lot,
                                        'lotID'=>$lot->id,
                                    ])
                    
                                    {{--Зміни до договору--}}
                                    @include('partials/blocks/tender/contract-changes', [
                                        'item'=>$lot,
                                        'lotID'=>$lot->id,
                                    ])
    
                                    {{--Виконання договору--}}
                                    @include('partials/blocks/tender/contract-ongoing', [
                                        'item'=>$lot,
                                        'lotID'=>$lot->id,
                                    ])
                                    
                                </div>
                            @endforeach
                        </div>
                        <?php
                            $lotted=true;
                        ?>
                    @endif

                    @if(!empty($lotted))
                        {{--Інформація про скасування--}}
                        @include('partials/blocks/tender/cancelled', [
                            'item'=>$item,
                            'tenderPeriod'=>!empty($item->tenderPeriod) ? $item->tenderPeriod : false,
                            'qualificationPeriod'=>!empty($item->qualificationPeriod) ? $item->qualificationPeriod : false
                        ])
                    @endif
    
                    {{--Подати пропозицію--}}
{{--                    @include('partials/blocks/tender/apply')--}}
                    @include('partials.areas')
                </div>
            </div>
        </div>
    @elseif ($error)
        <div style="padding:20px 20px 40px 10px;text-align:center">
            {!!$error!!}
        </div>
    @else
        <div style="padding:20px 20px 40px 10px;text-align:center">
            {{trans('tender.tender_not_found')}}
        </div>
    @endif

@endsection