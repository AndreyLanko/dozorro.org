@extends('layouts.app')

@section('content')

    @foreach($blocks as $block)

        @include('partials.longread.' . $block->alias, [
            'data' => $block->value,
            'block' => $block
        ])

    @endforeach



    <div class="c-b">
        <div class="container">
            <div class="tender_customer">
                <div class="inline-layout">
                    <div class="img-holder mobile">
                        <img src="assets/images/t-logo.svg" alt="title">
                    </div>
                    <div class="info_tender_customer">
                        <h3>Центр обслуговування підрозділів Національної поліції України</h3>
                        <div class="info_customer">
                            <div class="item inline-layout">
                                <div class="name">Тендерів:</div>
                                <div class="value">13</div>
                            </div>
                            <div class="item inline-layout">
                                <div class="name">Сумма закупок:</div>
                                <div class="value">234 000 211 000 грн.</div>
                            </div>
                            <div class="item inline-layout">
                                <div class="name">Отзывов:</div>
                                <div class="value">234</div>
                            </div>
                        </div>
                    </div>
                    <div class="img-holder">
                        <img src="assets/images/t-logo.svg" alt="title">
                    </div>
                </div>
            </div>


            <div class="filter_tender">
                <h4 class="js-filter-tender"><span>ПОШУК ЗА ПАРАМЕТРАМИ</span></h4>
                <form class="inline-layout">

                    <div class="form-group">
                        <label for="number_tender">Номер тендера</label>
                        <div class="input_number_tender"><input type="text" id="number_tender" name="number_tender" placeholder="UA-2016-01-01-000001"></div>
                    </div>

                    <div class="form-group">
                        <label for="">СУММА ТЕНДЕРА</label>
                        <div class="inline-layout">
                            <div class="input_price_from"><input type="text" id="price_from" name="price_from" placeholder=""></div>
                            <span>—</span>
                            <div class="input_price_before"><input type="text" id="price_before" name="price_before" placeholder=""></div>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="number_company">організацію, здійснюючу закупівлю</label>
                        <input type="text" id="number_company" name="number_company" placeholder="Назва організації">
                    </div>
                    <div class="form-group">
                        <label for="">Тип нарушения</label>
                        <select name="">
                            <option value="">Выберите из списка</option>
                            <option value="1">Варіант 1</option>
                            <option value="2">Варіант 2</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status_tender">Статус тендера</label>
                        <select id="status_tender" name="status_tender">
                            <option value="">Выберите из списка</option>
                            <option value="1">Варіант 1</option>
                            <option value="2">Варіант 2</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="object_tender">предмет закупівлі</label>
                        <input type="text" id="object_tender" name="object_tender" placeholder="">
                    </div>
                    <div class="form-group">
                        <button>Знайти</button>
                    </div>

                </form>
            </div>


            <div class="list_tender_company">
                <h4>тендери компанії</h4>
                <div class="overflow-table">
                    <table>
                        <tr>
                            <th>Останній відгук</th>
                            <th width="25%"><a class="order_up" href="#">ID тендера</a></th>
                            <th width="15%">Організація, здійснююча закупівлю</th>
                            <th width="12%">Сумма</th>
                            <th>Відгуки/ коментарі</th>
                            <th>Статус тендера</th>
                            <th width="15%">Тип нарушения</th>
                            <th>Реакция заказчика</th>
                            <th>Список ГО, работающих с тендером</th>
                        </tr>
                        <tr>
                            <td>
                                5.02.17
                            </td>
                            <td>
                                <a href="#">UA-2017-01-11-000511-b</a>
                                <p>Апаратура електрична для проводового</p>
                                <div class="link-more js-more">детальніше</div>
                            </td>
                            <td>
                                <a href="#">Департамент освіти і науки, молоді та спорту виконавчого органу Київської міської ради</a>
                                <div class="link-more js-more">детальніше</div>
                            </td>
                            <td>
                                22 345 211 грн.
                            </td>
                            <td>
                                5
                            </td>
                            <td>
                                Прекваліфікація
                            </td>
                            <td>
                                <span>Відхилення цін,
                                відносно ринкових,
                                в більшу сторону;
                                безпідставна
                                дискваліфікація</span>
                                <div class="link-more js-more">детальніше</div>
                            </td>
                            <td>
                                Ні
                            </td>
                            <td>
                                International
                            </td>
                        </tr>
                        <tr>
                            <td>
                                5.02.17
                            </td>
                            <td>
                                <a href="#">UA-2017-01-11-000511-b</a>
                                <p>Апаратура електрична для проводового</p>
                                <div class="link-more js-more">детальніше</div>
                            </td>
                            <td>
                                <a href="#">Департамент освіти і науки, молоді та спорту виконавчого органу Київської міської ради</a>
                                <div class="link-more js-more">детальніше</div>
                            </td>
                            <td>
                                22 345 211 грн.
                            </td>
                            <td>
                                5
                            </td>
                            <td>
                                Прекваліфікація
                            </td>
                            <td>
                                <span>Відхилення цін,
                                відносно ринкових,
                                в більшу сторону;
                                безпідставна
                                дискваліфікація</span>
                                <div class="link-more js-more">детальніше</div>
                            </td>
                            <td>
                                Ні
                            </td>
                            <td>
                                2
                            </td>
                        </tr>
                        <tr>
                            <td>
                                5.02.17
                            </td>
                            <td>
                                <a href="#">UA-2017-01-11-000511-b</a>
                                <p>Апаратура електрична для проводового</p>
                                <div class="link-more js-more">детальніше</div>
                            </td>
                            <td>
                                <a href="#">Департамент освіти і науки, молоді</a>
                            </td>
                            <td>
                                22 345 211 грн.
                            </td>
                            <td>
                                5
                            </td>
                            <td>
                                Прекваліфікація
                            </td>
                            <td>
                                <span>Відхилення цін</span>
                            </td>
                            <td>
                                Ні
                            </td>
                            <td>
                                2
                            </td>
                        </tr>
                        <tr>
                            <td>
                                5.02.17
                            </td>
                            <td>
                                <a href="#">UA-2017-01-11-000511-b</a>
                                <p>Апаратура електрична для проводового</p>
                                <div class="link-more js-more">детальніше</div>
                            </td>
                            <td>
                                <a href="#">Департамент освіти і науки, молоді та спорту </a>
                                <div class="link-more js-more">детальніше</div>
                            </td>
                            <td>
                                22 345 211 грн.
                            </td>
                            <td>
                                5
                            </td>
                            <td>
                                Прекваліфікація
                            </td>
                            <td>
                                <span>Відхилення цін</span>
                            </td>
                            <td>
                                Ні
                            </td>
                            <td>
                                2
                            </td>
                        </tr>
                        <tr>
                            <td>
                                5.02.17
                            </td>
                            <td>
                                <a href="#">UA-2017-01-11-000511-b</a>
                                <p>Апаратура електрична</p>
                            </td>
                            <td>
                                <a href="#">Департамент освіти і науки, молоді </a>
                            </td>
                            <td>
                                22 345 211 грн.
                            </td>
                            <td>
                                5
                            </td>
                            <td>
                                Прекваліфікація
                            </td>
                            <td>
                                <span>Відхилення цін</span>
                            </td>
                            <td>
                                Ні
                            </td>
                            <td>
                                2
                            </td>
                        </tr>
                    </table>
                </div>


            </div>
            <div class="list_tender_company mobile">

                    <table>
                        <tr>
                            <th>Останній відгук</th>
                            <th width="80%"><a class="order_up" href="#">ID тендера</a></th>

                        </tr>
                        <tr>
                            <td>
                                5.02.17
                            </td>
                            <td>
                                <a href="#">UA-2017-01-11-000511-b</a>
                                <p>Апаратура електрична для проводового</p>
                                <div class="link-more js-more">детальніше</div>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                5.02.17
                            </td>
                            <td>
                                <a href="#">UA-2017-01-11-000511-b</a>
                                <p>Апаратура електрична для проводового</p>
                                <div class="link-more js-more">детальніше</div>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                5.02.17
                            </td>
                            <td>
                                <a href="#">UA-2017-01-11-000511-b</a>
                                <p>Апаратура електрична для проводового</p>
                                <div class="link-more js-more">детальніше</div>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                5.02.17
                            </td>
                            <td>
                                <a href="#">UA-2017-01-11-000511-b</a>
                                <p>Апаратура електрична для проводового</p>
                                <div class="link-more js-more">детальніше</div>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                5.02.17
                            </td>
                            <td>
                                <a href="#">UA-2017-01-11-000511-b</a>
                                <p>Апаратура електрична</p>
                            </td>

                        </tr>
                    </table>

            </div>
        </div>

        <div class="link_pagination">Завантажити ще 20</div>

    </div>


@endsection