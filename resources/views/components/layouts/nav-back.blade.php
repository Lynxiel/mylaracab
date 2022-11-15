
<nav class="p-3 bg-dark text-white">
    <div class="container">
        <div id="top-menu" class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <ul class=" nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <x-controls.list text="Панель" route="admin.index" classes="nav-link px-2 "/>
                <x-controls.list text="Заказы" route="orders.index" classes="nav-link px-2 "/>
                <x-controls.list text="Товары" route="cables.index" classes="nav-link px-2 "/>
            </ul>

            <div>
                <a class="btn btn-outline-light me-2 lk-btn" href="{{route('index')}}">Вернуться на сайт</a>
                <a class="btn btn-outline-light me-2 lk-btn" href="{{route('account.show')}}">{{auth()->user()->email}}</a>
                <a href="{{ route('logout') }}" class="btn btn-outline-light me-2">Выйти</a>
            </div>
        </div>
    </div>
</nav>
