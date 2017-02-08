<tr>
    <td>
        @tenderdate($tender->date)
    </td>
    <td>
        <a href="#">{{ $item->tenderID }}</a>
        <p>{{ $item->title }}</p>
        @if(mb_strlen($item->title) > 50)
            <div class="link-more js-more">@lang('tenders.result.show_all_text')</div>
        @endif
    </td>
    @if(!$for_mobile)
    <td>
        <a href="#">
            @if(isset($item->procuringEntity->name))
                {{ $item->procuringEntity->name }}
            @endif
        </a>
        @if(isset($item->procuringEntity->name) && mb_strlen($item->procuringEntity->name) > 50)
            <div class="link-more js-more">@lang('tenders.result.show_all_text')</div>
        @endif
    </td>
    <td>
        {{ number_format($item->value->amount, 0, '', ' ') . ' ' . $item->value->currency }}
    </td>
    <td>
        5
    </td>
    <td>
        @if(isset($item->status))
            {{ !empty($dataStatus[$item->status]) ? $dataStatus[$item->status] : $item->status }}
        @endif
    </td>
    <td>
        <span>-</span>
    </td>
    <td>
        -
    </td>
    <td>
        -
    </td>
    @endif
</tr>