<!-- tender-header -->
<div class="tender-header">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1 class="tender-header__h1">
                    @if (in_array($item->procurementMethodType, ['aboveThresholdEU', 'competitiveDialogueEU', 'aboveThresholdUA.defense']))
                        @if (App::getLocale() == 'ua')
                             {{!empty($item->title) ? $item->title : trans('facebook.tender_no_name')}}
                             {{!empty($item->title_en) ? $item->title_en : trans('facebook.tender_no_name')}}
                        @elseif ((in_array($item->procurementMethodType, ['aboveThresholdEU', 'competitiveDialogueEU', 'aboveThresholdUA.defense']) && App::getLocale() == 'en'))
                             {{!empty($item->title_en) ? $item->title_en : trans('facebook.tender_no_name')}}
                             {{!empty($item->title) ? $item->title : trans('facebook.tender_no_name')}}
                        @endif
                    @else
                        {{!empty($item->title) ? $item->title : trans('facebook.tender_no_name')}}
                    @endif
                </h1>
                <h2 class="tender-header__h2">{{$item->tenderID}} ● {{$item->id}}</h2>
                <h3 class="tender-header__h3">
	                  <span>{{$item->__procedure_name}}</span>
                    @if(!empty($dataStatus[$item->status]))
                        @if(($item->__isOpenedQuestions || $item->__isOpenedClaims) && $item->procurementMethodType!='belowTheshold' && $item->status=='active.tendering' && !empty($item->tenderPeriod) && strtotime($item->tenderPeriod->endDate)<time())
                            <span>Заблоковано</span>
                        @else
                            <span>{{$dataStatus[$item->status]}}</span>
                        @endif
                    @endif
                    @if($item->__icon=='pen')
                        <a href="https://ips.vdz.ua/ua/purchase_details.htm?id={{$item->id}}" target="_blank">{{trans('tender.pen_info')}}</a>
                    @endif
                    @if($item->__isOpenedQuestions)
                        <span>Наявні запитання/вимоги без відповіді</span>
                    @endif
                    @if($item->__isOpenedClaims)
                        <span>Наявні {{$item->procurementMethodType != 'belowTheshold' ? 'скарги' : 'звернення'}} без рішення</span>
                    @endif
                </h3>
            </div>
            <div class="col-md-4">
                <div class="tender-header__review-button">
                    <a href="" class="tender-header__link my_popup_open" data-formjs="open">Залишити відгук</a>
                </div>
            </div>	
        </div>
        <div class="row">
            <div class="col-xs-12 tender-header__text">
                @if(!empty($item->__is_sign))
                    <div data-js="tender_sign_check" data-url="{{$item->__sign_url}}">
                        Електронний цифровий підпис накладено. <a href="" class="document-link" data-id="sign-check">Перевірити</a>
                        <div class="overlay overlay-documents">
                            <div class="overlay-close overlay-close-layout"></div>
                            <div class="overlay-box">
                                <div class="documents" data-id="sign-check">
                                    <h4 class="overlay-title">Перевірка підпису</h4>
                                    <div class="loader"></div>
                                    <div id="signPlaceholder"></div>
                                </div>
                                <div class="overlay-close"><i class="sprite-close-grey"></i></div>
                            </div>
                        </div>
                    </div>
                @else
                    <p>Електронний цифровий підпис не накладено</p>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- END tender-header -->