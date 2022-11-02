<div class="row w-100 text-center main-header position-relative">
        <img id="lines" class="position-absolute top-0 start-50 translate-middle-x" src="{{asset('images/lines.svg')}}">

    <div class="col-sm-6 col-xs-12 mt-sm-5 col-xs-12">
        <a href="{{route('index')}}"> <img id="logo" src="{{asset('images/logo2.svg')}}" /></a>
    </div>
    <div class="col-sm-6 col-xs-12 my-sm-5 pt-sm-5">
        <h1 class="text-white rubik">Оптовая продажа</h1>
        <h3 class="text-white rubik-light">электрического кабеля <br> в Тульской области</h3>
    </div>
</div>

<nav class="p-3  text-white site-nav">
    <div class="container">
        <div id="top-menu" class="d-flex flex-wrap align-items-right justify-content-end justify-content-lg-end">
            <ul class=" nav col-12 col-lg-auto me-lg-auto mb-0 justify-content-end mb-md-0">
                <x-controls.list text="Главная"           route="index"    classes="nav-link px-2 "/>
                <x-controls.list text="Доставка и оплата" route="delivery" classes="nav-link px-2 "/>
                <x-controls.list text="О нас"             route="about_us" classes="nav-link px-2 "/>
                {{$slot}}
            </ul>

            <div>

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
