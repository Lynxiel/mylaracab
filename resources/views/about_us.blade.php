<x-layouts.header title="КабельОпт71" />
<body>
<x-layouts.nav-front :cart="$cart" />
    <div class="content-container">
        @include('partials.flashmessages')

        <div class="px-4 mt-5  text-center ">
            <h1 class="display-4 fw-bold text-white text-uppercase">Кабель оптом</h1>
            <div class="col-lg-8 mx-auto">
                <p class="lead text-white">Мы небольшой семейный магазин
                    электротехнической продукции в городе Новомосковск Тульской области. У нас вы можете приобрести провода, кабель
                    для замены или прокладки электропроводки по оптовым ценам. Оставляйте заявку через
                    сайт и наши менеджеры свяжутся с Вами для подтверждения заказа и уточнения деталей доставки. Ведем свою деятельность с 1993г. и всегда обеспечиваем
                    наших клиентов низкими ценами, отличным сервисом и быстрым обслуживанием.</p>                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
                </div>
            </div>
        </div>

        <div class="container px-4" id="featured">
            <h2 class=" text-uppercase  text-white">Зачем покупать у нас?</h2>
            <div class="row g-4 row-cols-1 row-cols-lg-3">
                <div class="feature col">
                    <div class="feature-icon bg-orange bg-gradient p-4 text-center">
                       <img src="{{asset('images/piggy-bank.svg')}}">
                    </div>
                    <h2 class="text-white text-center mt-2">Низкие цены</h2>
                    <p class=" text-white">Мы получаем все товары напрямую от производителя без дополнительных поставщиков и транспортных компаний</p>
                </div>
                <div class="feature col">
                    <div class="feature-icon bg-orange bg-gradient p-4  text-center">
                        <img src="{{asset('images/clipboard2-check.svg')}}">
                    </div>
                    <h2 class="text-white text-center mt-2">Только ГОСТ</h2>
                    <p class="text-white">Сертифицированный кабель от надежного российского производителя</p>
                </div>
                <div class="feature col">
                    <div class="feature-icon bg-orange bg-gradient p-4  text-center">
                        <img src="{{asset('images/chat-heart.svg')}}">
                    </div>
                    <h2 class="text-white text-center mt-2">Гибкий подход</h2>
                    <p class="text-white">Возможны дополнительные скидки от суммы заказа. Менеджер свяжется с Вами
                    для уточнения деталей</p>
                </div>
            </div>
        </div>


        <div class="container mt-5  " id="requisites">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="text-white mb-4">Реквизиты</h2>
                    <p class="text-white fs-5 rubik-light">
                        ИП Кондратьев Александр Семенович <br>
                        301650 Тульская область, г. Новомосковск, ул.Вавилова, д. 1А <br>
                        ИНН 711600236125 <br>
                        КПП 0 <br>
                        р/с 40802810310450004255 <br>
                        Филиал "ЦЕНТРАЛЬНЫЙ" Банка ВТБ ПАО г. Москва <br>
                        БИК 044525411 <br>
                        корр/с 30101810145250000411 <br>
                        E-mail:	tricolor-nsk@mail.ru <br>
                        Телефон: +7-953-954-20-16 <br>
                        На основании свидетельства о регистрации индивидуального предпринимателя № 304711633000160 от 25.11.1993г.
                    </p>
                </div>
                <div class="col-md-6">
                    <h2 class="text-white mb-4">Отзывы </h2>
                    <div style="width:100%;height:600px;overflow:hidden;position:relative;">
                        <iframe style="width:100%;height:100%;border:1px solid #e6e6e6;border-radius:8px;box-sizing:border-box"
                                src="https://yandex.ru/maps-reviews-widget/1053776434?comments"></iframe>
                        <a href="https://yandex.ru/maps/org/elektrika/1053776434/" target="_blank"
                           style="box-sizing:border-box;text-decoration:none;color:#b3b3b3;font-size:10px;font-family:YS Text,sans-serif;padding:0 20px;position:absolute;bottom:8px;width:100%;text-align:center;left:0;overflow:hidden;text-overflow:ellipsis;display:block;max-height:14px;white-space:nowrap;padding:0 16px;box-sizing:border-box">Электрика
                            на карте Новомосковска — Яндекс Карты</a>
                    </div>

                </div>
            </div>

        </div>







    </div>
</body>
<x-layouts.footer />




