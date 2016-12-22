@if(!empty($block->data['tenders']) || !empty($block->data['reviews']))
<div class="c-hot">
    <div class="container">
        <div class="row">

            @if(isset($block->data['tenders']) && !empty($block->data['tenders']))
            <div class="col-md-6">
                <div class="c-list-card">
                    <div class="c-list-card__inner">
                        <h3 class="c-list-card__header">Актуальнi тендери</h3>
                        @foreach($block->data['tenders'] as $tender)
                            <?php $item = $tender->get_format_data(); ?>
                            @if($item)
                            <div class="sb-list-item">
                                <div class="sb-list-item__row">
                                    <h2><a href="/tender/{{ $item->tenderID }}/">{{ $item->title }}</a></h2>
                                    <h3>{{ $item->description }}</h3>
                                </div>
                                <div class="sb-list-item__row">
                                    <a href="#" class="sb-list-item__stat">Кваліфікація переможця</a>
                                    <a href="#" class="sb-list-item__comments">{{ $tender->comments }}</a>
                                </div>
                            </div>
                            @endif
                        @endforeach
                        <div class="c-list-card__link-wrap">
                            <a href="#">Всі тендери</a>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if(is_array($block->data['reviews']) && !empty($block->data['reviews']))
            <div class="col-md-6">
                <div class="c-list-card">
                    <div class="c-list-card__inner">
                        <h3 class="c-list-card__header">Обговорюванi тендери</h3>
                        @foreach($block->data['reviews'] as $item)
                            @if(isset($item->data) && $item->data)
                                <div class="sb-list-item">
                                    <div class="sb-list-item__row">
                                        <h2><a href="/tender/{{ $item->data->tenderID }}/">{{ $item->data->title }}</a></h2>
                                        @if(isset($item->data->description))<h3>{{ $item->data->description }}</h3>@endif
                                    </div>
                                    <div class="sb-list-item__row">
                                        <a href="#" class="sb-list-item__stat">Кваліфікація переможця</a>
                                        <a href="#" class="sb-list-item__comments">{{ $item->data->total_reviews }}</a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <div class="c-list-card__link-wrap">
                            <a href="#">Всі популярні тендери</a>
                        </div>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>
</div>
@endif