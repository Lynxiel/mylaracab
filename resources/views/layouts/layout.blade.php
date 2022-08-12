<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $_ENV['APP_NAME'] }}</title>
    <link rel="stylesheet" href="/vendor/twbs/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="/resources/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>
<body class="antialiased">
<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/" class="nav-link px-2 text-secondary">Главная</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Доставка и оплата</a></li>
                <li><a href="#" class="nav-link px-2 text-white">О нас</a></li>
            </ul>

            <div class="text-end">
                @if (isset(auth()->user()->email))
                    @include('partials.logout')
                @else
                    @include('partials.login')
                    @include('partials.register')
                @endif

                <button id="cart-btn" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#CartModal" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
                    </svg>
                </button>
                <div class="modal fade" id="CartModal" tabindex="-1" aria-labelledby="CartModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Корзина</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" id="cart-container">

                                @if (!empty($cart))
                                    <?php $sum=0; ?>
                                        @foreach ($cart as $item)
                                            <?php $sum =$sum +$item->price*100; ?>
                                            <div class="list-group w-auto">
                                                        <div class="row ">
                                                            <div class="col-md-12">
                                                                <div  class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                                                                    <div class="d-flex gap-2 w-100 justify-content-between">
                                                                        <div>
                                                                            <h6 class="mb-0">{{$item->title}} </h6>
                                                                            <p class="mb-0 opacity-75">В наличии: {{$item->instock}}м</p>
                                                                        </div>
                                                                        <small class="opacity-50 text-nowrap cable-price">{{$item->price}}₽</small>

                                                                        <input  id="quantity" class="form-control-sm" required name="quantity"  value="100">
                                                                         <div>
                                                                            <form method="post" action="{{route('removeFromCart')}}">
                                                                                @csrf
                                                                                <input  required name="cable_id" readonly value="{{$item->cable_id}}" hidden>
                                                                                <small class="cable-summ text-muted text-center">{{$item->price*100}}₽</small>
                                                                                <button type="submit" class="btn btn-outline-danger btn-remove-cart">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                                                    </svg>
                                                                                </button>
                                                                            </form>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>

                                            </div>
                                        @endforeach
                                        <div class="mt-1">
                                            <small class="col-3">Ожидаемая дата доставки: {{date('d.m.y', strtotime(date('d.m.y').'+2 day'))}}</small>
                                            <strong id="order-sum" class="col-3">Итого:{{$sum}}₽</strong>
                                        </div>
                                            @else
                                В корзине пока пусто
                                @endforelse


                            </div>
                            <div class="modal-footer">
                                <input class="form-check-input" type="checkbox" value="" id="order-confirm">
                                <label class="form-check-label" for="order-confirm">
                                    Подтвердить заказ
                                </label>
                                <button type="button" class="btn btn-primary disabled" disabled="disabled">Отправить</button>
                                @if (session('success')=='Успешно удалено из корзины!')

                                    <script>
                                        $(function() {
                                            $('#cart-btn').click();
                                        });
                                    </script>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
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



        <div class="col-lg-8 col-sm-4 ">
            <div id="map-container"><script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A2aecac75b358a6d10ac59051e500a2345a3538f1563e36dd85f799fdc16535f9&amp;width=100%25&amp;height=200&amp;lang=ru_RU&amp;scroll=true"></script></div>
        </div>

        <div class="justify-content-center text-center text-muted company-name">
            © {{ date('Y') }} ИП Кондратьев А.С.
        </div>

    </footer>
</div>
<script src="/vendor/twbs/bootstrap/dist/js/bootstrap.js"></script>
@yield('scripts')
<script src="/resources/js/app.js"></script>
<script>

</script>

</html>
