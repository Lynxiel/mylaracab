
<nav class="p-3 bg-dark text-white fixed-top ">
    <div class="container">
        <div id="top-menu" class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <ul class=" nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <x-controls.list text="Главная"           route="index"    classes="nav-link px-2 "/>
                <x-controls.list text="Доставка и оплата" route="delivery" classes="nav-link px-2 "/>
                <x-controls.list text="О нас"             route="about_us" classes="nav-link px-2 "/>
                {{$slot}}

            </ul>
        <div>
            @can('dashboard')
                <a class="btn btn-outline-light me-2 lk-btn" href="{{route('admin.index')}}">Админ панель</a>
            @endif
            <a class="btn btn-outline-light me-2 lk-btn" href="{{route('account.show')}}">{{auth()->user()->email}}</a>
            <a href="           {{ route('logout') }}" class="btn btn-outline-light me-2">Выйти</a>
            </div>
        </div>
    </div>
</nav>
