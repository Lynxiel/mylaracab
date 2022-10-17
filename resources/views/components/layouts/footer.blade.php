<div class="container">
    <footer class="row row-cols-1">

        <div class="col-lg-2  col-sm-4 col-6  footer-menu">
            <h5>Меню</h5>
            <ul class="nav flex-column justify-content-between">
                <x-controls.list text="Главная" route="index" classes=" nav-link p-0 m-0 " color="secondary"/>
                <x-controls.list text="Доставка и оплата" route="delivery" classes="nav-link p-0 m-0 " color="secondary"/>
                <x-controls.list text="О нас" route="about_us" classes="nav-link p-0 m-0 " color="secondary" />
            </ul>
        </div>

        <div class="col-lg-2 col-sm-4 col-6 company-contacts">
            <h5>Контакты</h5>
            <ul class="nav flex-column ">
                <li class="nav-item mb-2 text-muted">+7-953-954-20-16</li>
                <li class="nav-item mb-2 text-muted">tricolor-nsk@mail.ru</li>
                <li class="nav-item mb-2 text-muted">г.Новомосковск</li>
                <li class="nav-item mb-2 text-muted">ул. Садовского д.34</li>
            </ul>
        </div>



        <div class="col-lg-8 col-sm-4 ">
            <div id="map-container"><script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A2aecac75b358a6d10ac59051e500a2345a3538f1563e36dd85f799fdc16535f9&amp;width=100%25&amp;height=200&amp;lang=ru_RU&amp;scroll=true"></script></div>
        </div>

        <div class="justify-content-center text-center text-muted company-name">
            © {{ date('Y') }} ИП Кондратьев А.С.
        </div>

    </footer>
</div>
