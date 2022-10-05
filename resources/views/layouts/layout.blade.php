<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $_ENV['APP_NAME'] }}</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap/dist/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">


    <script src="{{asset('bootstrap/dist/js/bootstrap.js')}}"></script>
    <script src="{{asset('/js/jquery.js')}}"></script>
    <script src="{{asset('/js/app.js')}}"></script>
    <script src="{{asset('/js/jquery.maskedinput.js')}}"></script>


</head>
<body class="antialiased">
<nav class="p-3 bg-dark text-white fixed-top ">
     <div class="container">
        <div id="top-menu" class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

            <ul class=" nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{route('index')}}" class="nav-link px-2 text-secondary">Главная</a></li>
                <li><a href="{{route('delivery')}}" class="nav-link px-2 text-white">Доставка и оплата</a></li>
                <li><a href="{{route('about_us')}}" class="nav-link px-2 text-white">О нас</a></li>
            </ul>

            <div class="text-end">
                @if (isset(auth()->user()->email))
                    @include('partials.logout')
                @else
                    @include('partials.login')
                    @include('partials.register')
                @endif
                <span id="cart-replace">
                    @include('partials.cart')
                </span>


            </div>
        </div>
    </div>
</nav>
@include('partials.flashmessages')
<div class="container content-container">
    @yield('content')
</div>
</body>
<div class="container">
    <footer class="row row-cols-1">

        <div class="col-lg-2  col-sm-4 col-6  footer-menu">
            <h5>Меню</h5>
            <ul class="nav flex-column justify-content-between">
                <li class="nav-item mb-2"><a href="{{route('index')}}" class="nav-link p-0 text-muted">Главная</a></li>
                <li class="nav-item mb-2"><a href="{{route('delivery')}}" class="nav-link p-0 text-muted">Доставка и оплата</a></li>
                <li class="nav-item mb-2"><a href="{{route('about_us')}}" class="nav-link p-0 text-muted">О Нас</a></li>
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
    @yield('scripts')
</div>

</html>
