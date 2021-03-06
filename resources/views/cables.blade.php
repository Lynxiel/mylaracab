@extends('layouts.layout')
@section('content')

<div class="px-4 py-5 my-5 text-center container">
    <h1 class="display-5 fw-bold">Кабель оптом</h1>
    <div class="col-lg-12 mx-auto">
        <p class="lead mb-4">Приветствуем на сайте по оптовой продаже кабеля по Тульской области. Мы небольшой семейный магазин
             электротехнической продукции в городе Новомосковск. Оставляйтете заявку через
        сайт и наши менеджеры свяжутся с Вами для подтверждения заказа и деталей доставки. Ведем свою деятельность с 1993г. и всегда обеспечиваем
        наших клиентов низкими ценами,отличным сервисом и быстрым обслуживанием.</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        </div>
    </div>
</div>


<div class="container">
    <div class="list-group w-auto">
        @foreach($cables as $key=>$cable)
            @if (!isset($prevCableGroup) || $prevCableGroup!=$cable->group_id)
            <div class="row group-container">
                <div class="col-md-4">
                    <h3 class="group-title">{{$cable->group_title}}</h3>
                    <p class="group-description">{{$cable->description}}</p>
                    <img class="group-image"  src="{{ $cable->image?'/public/'.$cable->image:asset('images/default.jpg') }}">
                </div>
                <div class="col-md-8">
                @endif
                    <div  class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                        <div class="d-flex gap-2 w-100 justify-content-between">
                            <div>
                                <h6 class="mb-0">{{$cable->cable_title}} </h6>
                                <p class="mb-0 opacity-75">В наличии: {{$cable->instock}}м</p>
                            </div>
                            <small class="opacity-50 text-nowrap cable-price">{{$cable->price}}₽</small>
                            <button type="button" class="btn btn-warning" id="cart_{{$cable->cable_id}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
                                </svg>

                            </button>


                        </div>

                    </div>
            @if (!isset($cables[$key+1]->group_id) || $cables[$key+1]->group_id!=$cable->group_id)
                </div>
            </div>
                <div class="clearfix"></div>
            @endif

                <?php $prevCableGroup =  $cable->group_id ?>

        @endforeach
    </div>
</div>
@endsection('content')



