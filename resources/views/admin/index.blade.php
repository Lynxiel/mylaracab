<x-layouts.header>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
</x-layouts.header>
<x-layouts.nav >
    <x-controls.list text="Заказы" route="orders.index" classes="nav-link px-2 "/>
    <x-controls.list text="Товары" route="cables.index" classes="nav-link px-2 "/>
</x-layouts.nav>
<body>
<div class="content-container bg-light">
    <div class="container">
            @include('partials.flashmessages')

        <main class="col-md-12 ms-sm-auto col-lg-12 px-md-12"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Административная панель</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        This week
                    </button>
                </div>
            </div>

            <canvas class="my-4 w-100 chartjs-render-monitor" id="myChart" width="989" height="417" style="display: block; width: 989px; height: 417px;"></canvas>

            <x-partials.orders title="Последние заказы" :orders="$orders" />
        </main>


    </div>
</div>
</body>





