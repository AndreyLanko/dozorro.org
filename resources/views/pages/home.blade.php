@extends('layouts/app')

@section('content')

<div homepage>
    @foreach($blocks as $block)
        @include('partials.longread.' . $block->alias, [
            'data' => $block->value
        ])
    @endforeach

    <div class="block_info_foto_home c-t" >

        <div class="container">
            <h2>Система мотніторингу закупівель</h2>
            <div class="text_holder">Здесь можно описать что конкретно делает сервис или что будет если нажать на кнопки</div>
            <div class="button_holder">
                <a href="#">Пошук тендера</a>
                <a href="#">Всі відгуки</a>
            </div>
        </div>

        <div class="c-t__bgimg" style="background-image: url('/assets/images/c-t/c/c-t-bgimg.jpg');"></div>

    </div>

    <div class="block_customers_logo">
        <div>
            <div class="container">
                <div class="row title_block">

                    <h3 class="col-md-10">Замовники, що працюють на порталі</h3>

                    <a href="#" class="col-md-2 all_customers">Всі замовники</a>

                </div>


                <div class="row">
                    <div class="col-xs-6  col-md-2 item">
                        <a href="#">
                            <div class="image-holder">
                                <div class="img" style="background: url('../assets/images/platforms/brizol.png') no-repeat center; background-size: contain;"></div>
                                <img class="fake-img" src="/assets/images/platforms/brizol.png" alt="brizol">
                            </div>
                            <div class="name_customers">brizol</div>
                        </a>

                    </div>
                    <div class="col-xs-6  col-md-2 item">
                        <a href="#">
                            <div class="image-holder">
                                <div class="img" style="background: url('../assets/images/platforms/etender.png') no-repeat center; background-size: contain;"></div>
                                <img class="fake-img" src="/assets/images/platforms/etender.png" alt="brizol">
                            </div>
                            <div class="name_customers">etender</div>
                        </a>

                    </div>
                    <div class="col-xs-6  col-md-2 item">
                        <a href="#">
                            <div class="image-holder">
                                <div class="img" style="background: url('../assets/images/platforms/lpzakupki.png') no-repeat center; background-size: contain;"></div>
                                <img class="fake-img" src="/assets/images/platforms/lpzakupki.png" alt="brizol">
                            </div>
                            <div class="name_customers">lpzakupki</div>
                        </a>

                    </div>
                    <div class="col-xs-6  col-md-2 item">
                        <a href="#">
                            <div class="image-holder">
                                <div class="img" style="background: url('../assets/images/platforms/netcast.png') no-repeat center; background-size: contain;"></div>
                                <img class="fake-img" src="/assets/images/platforms/netcast.png" alt="brizol">
                            </div>
                            <div class="name_customers">netcast</div>
                        </a>

                    </div>
                    <div class="col-xs-6 col-md-2 item">
                        <a href="#">
                            <div class="image-holder">
                                <div class="img" style="background: url('../assets/images/platforms/newtend.png') no-repeat center; background-size: contain;"></div>
                                <img class="fake-img" src="/assets/images/platforms/newtend.png" alt="brizol">
                            </div>
                            <div class="name_customers">newtend</div>
                        </a>

                    </div>
                    <div class="col-xs-6 col-md-2 item">
                        <a href="#">
                            <div class="image-holder">
                                <div class="img" style="background: url('../assets/images/platforms/pb.png') no-repeat center; background-size: contain;"></div>
                                <img class="fake-img" src="/assets/images/platforms/pb.png" alt="brizol">
                            </div>
                            <div class="name_customers">pb</div>
                        </a>

                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection