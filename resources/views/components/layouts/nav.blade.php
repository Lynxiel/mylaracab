
<nav class="p-3 bg-dark text-white fixed-top ">
    <div class="container">
        <div id="top-menu" class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <ul class=" nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <x-controls.list text="Главная"           route="index"    classes="nav-link px-2 "/>
                <x-controls.list text="Доставка и оплата" route="delivery" classes="nav-link px-2 "/>
                <x-controls.list text="О нас"             route="about_us" classes="nav-link px-2 "/>

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
