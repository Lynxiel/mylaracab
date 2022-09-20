<div class="container">
    <footer class="row row-cols-1">

        <div class="col-lg-2  col-sm-4 col-6  footer-menu">
            <h5>Меню</h5>
            <ul class="nav flex-column justify-content-between">
                <li><a href="{{route('index')}}" class="nav-link p-0 text-muted">Главная</a></li>
                <li><a href="{{route('delivery')}}" class="nav-link p-0 text-muted">Доставка и оплата</a></li>
                <li><a href="{{route('about_us')}}" class="nav-link p-0 text-muted">О Нас</a></li>
            </ul>
        </div>

        <div class="col-lg-2 col-sm-4 col-6 company-contacts">
            <h5>Контакты</h5>
            <ul class="nav flex-column ">
                <li class="nav-item mb-2">+7-953-954-20-16</li>
                <li class="nav-item mb-2">tricolor-nsk@mail.ru</li>
                <li class="nav-item mb-2">г.Новомосковск</li>
                <li class="nav-item mb-2">ул. Садовского д.34</li>
            </ul>
        </div>

        <div class="justify-content-center text-center text-muted company-name">
            © {{ date('Y') }} ИП Кондратьев А.С.
        </div>

    </footer>
</div>
