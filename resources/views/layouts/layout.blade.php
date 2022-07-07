<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $_ENV['APP_NAME'] }}</title>
    <link rel="stylesheet" href="/vendor/twbs/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="/vendor/twbs/bootstrap/dist/js/bootstrap.js">
    <link rel="stylesheet" href="/resources/css/style.css">


</head>
<body class="antialiased">
<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link px-2 text-secondary">Главная</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Доставка и оплата</a></li>
                <li><a href="#" class="nav-link px-2 text-white">О нас</a></li>
            </ul>

            <div class="text-end">
                <button type="button" class="btn btn-outline-light me-2">Вход</button>
                <button type="button" class="btn btn-warning">Регистрация</button>
            </div>
        </div>
    </div>
</header>
<div class="container">
    @yield('content')
</div>


</body>
<div class="container">
    <footer class="row row-cols-1">
        <div class="col-lg-6 ">
            <div id="map-container"><script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A2aecac75b358a6d10ac59051e500a2345a3538f1563e36dd85f799fdc16535f9&amp;width=100%25&amp;height=200&amp;lang=ru_RU&amp;scroll=true"></script></div>
        </div>

        <div class="col-lg-4 col-sm-6 col-6 company-contacts">
            <h5>Контакты</h5>
            <ul class="nav flex-column ">
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">+7-953-954-20-16</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">tricolor-nsk@mail.ru</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">г.Новомосковск</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">ул. Садовского д.34</a></li>
            </ul>
        </div>

        <div class="col-lg-2  col-sm-6 col-6 footer-menu">
            <h5>Меню</h5>
            <ul class="nav flex-column justify-content-between">
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Главная</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Доставка и оплата</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">О Нас</a></li>
            </ul>
        </div>
        <div class="justify-content-center text-center text-muted company-name">
            © 2022 ИП Кондратьев А.С.
        </div>

    </footer>
</div>

</html>
