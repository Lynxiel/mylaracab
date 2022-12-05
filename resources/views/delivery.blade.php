<x-layouts.header title="КабельОпт71" />
<body>
    <x-layouts.nav-front :cart="$cart" />

    <div class="container mt-4">
        @include('partials.flashmessages')
    </div>

    <div class="container px-4 my-4 regions">

{{--        @if ($regions)--}}
{{--            <div class="row text-white border-orange bg-orange rubik-bold mb-4 ">--}}
{{--                <div class="col-5 text-white text-uppercase">Регион</div>--}}
{{--                <div class="col-5 text-white text-uppercase">Город</div>--}}
{{--                <div class="col-2 text-white text-uppercase">Стоимость</div>--}}
{{--            </div>--}}
{{--            @foreach( $regions as $region)--}}
{{--                <div class="row text-white">--}}
{{--                    <div class="col-5">{{$region['region']}}</div>--}}
{{--                    <div class="col-5">{{$region['city']}}</div>--}}
{{--                    <div class="col-2">{{$region['price']}}₽</div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        @endif--}}
        <h2 class="mt-5 mb-2 text-white text-uppercase ">Самовывоз</h2>
        <p class="text-white">Заказ можно забрать самовывозом по адресу г.Новомосковск, ул. Садовского, д.34, магазин "Электрика"</p>
        <h2 class=" mt-5 mb-2 text-white text-uppercase ">Доставка</h2>
        <div class="row">
            <div class="col-12 col-sm-6">
                <p class="text-white">
                    Бесплатная доставка осуществляется в города:
                </p>
                <ul class="list-group">
                    <li class="list-group-item  bg-dark text-white">Новомосковск</li>
                    <li class="list-group-item  bg-dark text-white">Донской</li>
                    <li class="list-group-item  bg-dark text-white">Узловая</li>
                    <li class="list-group-item  bg-dark text-white">Северо-Задонск</li>
                </ul>
            </div>
            <div class="col-12 col-sm-6 mt-2 mt-sm-0">
                <p class="text-white">
                    Доставка в другие города осуществляется через ТК:
                </p>
                <ul class="list-group">
                    <li class="list-group-item  bg-dark text-white">СДЭК</li>
                    <li class="list-group-item  bg-dark text-white">Деловые линии</li>
                </ul>
            </div>
        </div>






    </div>

    <div class="container px-4 mt-4" id="featured">
        <h2 class=" text-uppercase  text-white">Способы оплаты</h2>
        <div class="row g-4 row-cols-1 row-cols-lg-3">
            <div class="feature col">
                <div class="feature-icon bg-orange bg-gradient p-4 text-center">
                    <img src="{{asset('images/cash-stack.svg')}}">
                </div>
                <h2 class="text-white text-center mt-2">Наличными</h2>
                <p class=" text-white">Оплата при самовывозе из магазина. Предоставляем кассовый/товарный чек при получении заказа</p>
            </div>
            <div class="feature col">
                <div class="feature-icon bg-orange bg-gradient p-4  text-center">
                    <img src="{{asset('images/phone.svg')}}">
                </div>
                <h2 class="text-white text-center mt-2">СПБ</h2>
                <p class="text-white">Оплата онлайн через через СПБ на расчетный счет организации. Предоставляем кассовый/товарный чек</p>
            </div>
            <div class="feature col">
                <div class="feature-icon bg-orange bg-gradient p-4  text-center">
                    <img src="{{asset('images/card-list.svg')}}">
                </div>
                <h2 class="text-white text-center mt-2">Счет</h2>
                <p class="text-white">Оплата по счету для организаций. Работаем без НДС. Предоставляем товарные накладные при получении заказа</p>
            </div>
        </div>
    </div>

</body>
<x-layouts.footer />




