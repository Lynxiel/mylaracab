<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Учетные данные для входа Kabelopt71.ru</title>
</head>
<body class="antialiased">
<div>Для доступа в Ваш личный кабинет используйте учетные данные:</div>
<div>Email: {{$email}}</div>
<div>Пароль: {{$password}}</div>


<div class="container">
    <footer class="row row-cols-1">

        <div class="col-lg-2  col-sm-4 col-6  footer-menu">
            <h5>Меню</h5>
            <ul class="nav flex-column justify-content-between">
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Главная</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Доставка и оплата</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">О Нас</a></li>
            </ul>
        </div>

        <div class="col-lg-2 col-sm-4 col-6 company-contacts">
            <h5>Контакты</h5>
            <ul class="nav flex-column ">
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">+7-953-954-20-16</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">tricolor-nsk@mail.ru</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">г.Новомосковск</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">ул. Садовского д.34</a></li>
            </ul>
        </div>

        <div class="justify-content-center text-center text-muted company-name">
            © {{ date('Y') }} ИП Кондратьев А.С.
        </div>

    </footer>
</div>

</html>
