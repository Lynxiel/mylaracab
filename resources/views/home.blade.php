@extends('layouts.layout')
@section('content')
    @if(!isset(auth()->user()->id))
        <div class="px-4 py-5 text-center container">
            <h1 class="display-5 fw-bold">Кабель оптом</h1>
            <div class="col-lg-12 mx-auto">

                <p class="lead mb-4">Приветствуем на сайте по оптовой продаже кабеля по Тульской области. Мы небольшой семейный магазин
                    электротехнической продукции в городе Новомосковск. Оставляйтете заявку через
                    сайт и наши менеджеры свяжутся с Вами для подтверждения заказа и деталей доставки. Ведем свою деятельность с 1993г. и всегда обеспечиваем
                    наших клиентов низкими ценами, отличным сервисом и быстрым обслуживанием.</p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                </div>
            </div>

        </div>
    @endif


    <div class="container mt-4">
        <div class="list-group">
            @foreach($cables as $key=>$cable)
                @if (!isset($prevCableGroup) || $prevCableGroup!=$cable->group_id)
                    <div class="row group-container">
                        <div class="col-md-4">
                            <h3 class="group-title">{{$cable->group_title}}</h3>
                            <p class="group-description">{{$cable->description}}</p>
                            <img class="group-image"  src="{{ $cable->image?:asset('images/default.jpg') }}">
                        </div>
                        <div class="col-md-8" id="cables-container">
                            @endif
                            <div  class="row mt-1 mb-1 pb-1 " aria-current="true">
                                <div class=" col-md-5 col-lg-6 col-sm-5 col-5">
                                    <strong class="mb-0 cable-title">{{$cable->cable_title}} </strong>
                                    <p class="mb-0 opacity-75 text-success cable-instock">В наличии: {{$cable->instock}}м</p>
                                </div>
                                <div class="col-md-2 col-lg-2 col-sm-2 col-2 d-none d-sm-block cable-footage"><p class="pt-2 mb-0 ">{{$cable->footage}}м</p></div>
                                <div class="col-md-3 col-lg-2  col-sm-3 col-4 badge bg-secondary text-wrap cable-price">
                                    <div class="mt-1">{{$cable->price}}₽/м</div>
                                    <div class="mt-1">{{$cable->price*$cable->footage}}₽/бухта</div>
                                </div>
                                <div class="col-md-2 col-lg-2  col-sm-2 col-3 text-end">
                                    <form method="post" action="{{route('addToCart')}}">
                                        @csrf
                                        <input  required name="cable_id" readonly value="{{$cable->cable_id}}" hidden>
                                        @if ( session()->get('cable_id')!=null && key_exists($cable->cable_id,session()->get('cable_id')) )
                                            <span class="d-inline-block w-100" tabindex="0" data-bs-toggle="tooltip" title="Уже в корзине">
                                                <button  type="button" disabled class="btn btn-success cart-added" id="cart_{{$cable->cable_id}}"  >
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-check" viewBox="0 0 16 16">
                                                        <path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                                                        <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                                    </svg>
                                                </button>
                                            </span>
                                        @else
                                            <button  type="submit"  class="btn btn-warning  cart-add" data-bs-toggle="tooltip" data-bs-placement="top" title="Добавить в корзину">
                                                <svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
                                                </svg>
                                                @endif

                                            </button>
                                    </form>
                                </div>
                            <hr class="m-0 p-0 mt-2">
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



