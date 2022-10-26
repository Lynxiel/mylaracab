<x-layouts.header/>
<x-layouts.nav >
    <x-controls.list text="Заказы" route="orders.index" classes="nav-link px-2 "/>
    <x-controls.list text="Товары" route="cables.index" classes="nav-link px-2 "/>
</x-layouts.nav>
<body>
<div class="content-container">
    <div class="container mt-4">
        @include('admin.partials.flashmessages')

       <x-partials.orders title="Заказы" :orders="$orders" />

    </div>
</div>
</body>





