<x-layouts.header>
</x-layouts.header>
<x-layouts.nav-back />
<body>
<div class="bg-light">
    <div class="container py-4">
            @include('partials.flashmessages')

        <main class="col-md-12 ms-sm-auto col-lg-12 px-md-12"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Административная панель</h1>

            </div>
            <x-partials.orders title="Последние заказы" :orders="$orders" />
        </main>


    </div>
</div>
</body>





