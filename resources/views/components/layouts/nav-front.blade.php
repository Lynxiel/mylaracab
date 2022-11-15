<div class="container">
    <div class="row w-100 mx-0 text-center main-header position-relative">
        <img id="lines" class="position-absolute top-0 start-50 translate-middle-x" src="{{asset('images/lines.svg')}}">
        <div class="position-absolute top-0 end-0 ">
            <p class="text-white  text-center text-md-end text-uppercase fw-bolder mb-0">Нужна помощь? Звоните</p>
            <a href="tel:+79539542016">
                <h4 class="text-uppercase text-orange text-center text-md-end">+7 (953)-954-20-16</h4>
            </a>
            <div class="text-center text-md-end work-hours">
                <small class="text-white">Пн-пт:10-19</small>
                <small class="text-white ">Сб-вс:10-17</small>
            </div>

        </div>
        <div class="col-sm-6 col-xs-12 mt-5 mt-md-3 col-xs-12 text-center text-sm-start">
            <a href="{{route('index')}}"> <img id="logo" class="mt-4  "  alt="КабельОпт71" src="{{asset('images/logo2.svg')}}" /></a>
        </div>
        <div class="col-sm-6 col-xs-12 mt-sm-5 pt-sm-5">
            <h3 class="text-white rubik text-center text-sm-end mt-sm-4 mt-md-2">Оптовая продажа
                электрического кабеля в Тульской области</h3>
        </div>
    </div>
</div>


<nav class="pb-3  text-white site-nav">
    <div class="container">
        <div id="top-menu" class="d-flex flex-wrap align-items-right justify-content-center justify-content-lg-center">
            <ul class=" nav col-12 col-md-auto me-md-auto mb-0 justify-content-center mb-md-0">
                <x-controls.list text="Главная"           route="index"    classes="nav-link px-2 "/>
                <x-controls.list text="Доставка и оплата" route="delivery" classes="nav-link px-2 "/>
                <x-controls.list text="О нас"             route="about_us" classes="nav-link px-2 "/>
                {{$slot}}
            </ul>

            <div>
                @can('dashboard')
                    <a class="btn btn-outline-light me-2 lk-btn" href="{{route('admin.index')}}">Админ панель</a>
                @endif

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
