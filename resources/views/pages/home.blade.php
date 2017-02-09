@extends('layouts/app')

@section('content')

<div homepage>
    @foreach($blocks as $block)
        @include('partials.longread.' . $block->alias, [
            'data' => $block->value
        ])
    @endforeach


        <div class="block_customers_logo">
            <div class="container">
                <div class="inline-layout title_block">

                        <h3>Замовники, що працюють на порталі</h3>

                        <a href="#" class="all_customers">Всі замовники</a>

                </div>


                <div class="row">
                    <div class="col-md-2">
                        <a href="#">
                            <div class="img-holder">
                                <img src="/assets/images/t-logo.svg" alt="Дозорро">
                            </div>
                            <div class="name_customers">Дозорро</div>
                        </a>

                    </div>
                    <div class="col-md-2">
                        <a href="#">
                            <div class="img-holder">
                                <img src="/assets/images/t-logo.svg" alt="Дозорро">
                            </div>
                            <div class="name_customers">Дозорро</div>
                        </a>

                    </div>
                    <div class="col-md-2">
                        <a href="#">
                            <div class="img-holder">
                                <img src="/assets/images/t-logo.svg" alt="Дозорро">
                            </div>
                            <div class="name_customers">Дозорро</div>
                        </a>

                    </div>
                    <div class="col-md-2">
                        <a href="#">
                            <div class="img-holder">
                                <img src="/assets/images/t-logo.svg" alt="Дозорро">
                            </div>
                            <div class="name_customers">Дозорро</div>
                        </a>

                    </div>
                    <div class="col-md-2">
                        <a href="#">
                            <div class="img-holder">
                                <img src="/assets/images/t-logo.svg" alt="Дозорро">
                            </div>
                            <div class="name_customers">Дозорро</div>
                        </a>

                    </div>
                    <div class="col-md-2">
                        <a href="#">
                            <div class="img-holder">
                                <img src="/assets/images/t-logo.svg" alt="Дозорро">
                            </div>
                            <div class="name_customers">Дозорро</div>
                        </a>

                    </div>
                </div>
            </div>
        </div>

</div>

@endsection