<x-layouts.header/>
<x-layouts.nav-back />
<body>
<div class="bg-light">
    <div class="container py-4">
        @include('admin.partials.flashmessages')

       <x-partials.orders title="Заказы" :orders="$orders" />

    </div>
</div>
</body>





