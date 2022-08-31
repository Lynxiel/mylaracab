@extends('layouts.layout')
@section('content')

    <div class="container" id="account">
        <h2 class="mt-4">Личный кабинет</h2>
        <h4>История заказов</h4>


        <div class="list-group w-auto">
            @php  $summ = 0; $i=1; @endphp
            @if (isset($orders[0]->order_id))
                @foreach($orders as $key=>$order)
                    @if (!isset($prevOrderId) || $prevOrderId!=$order->order_id)
                        @php  $summ = 0;  @endphp

        <div class="accordion" >
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-heading{{$i}}">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse{{$i}}" aria-expanded="true" aria-controls="panelsStayOpen-collapse{{$i}}">
                        <h6 class="group-title">№{{$order->order_id}} от {{$order->created_at}} -  @switch($order->status)
                                @case(0)
                                Создан
                                @break

                                @case(1)
                                Подтвержден
                                @break

                                @case(2)
                                Оплачен
                                @break

                                @case(3)
                                Завершен
                                @break

                            @endswitch </h6>
                    </button>
                </h2>
                <div id="panelsStayOpen-collapse{{$i}}" class="accordion-collapse collapse {{ ($i==1?'show':'') }}" aria-labelledby="panelsStayOpen-heading{{$i}}">
                    <div class="accordion-body">
                        <div class="row ">
                            <p>

                                <a class="px-4" href="{{route('formInvoice', ['order_id' => $order->order_id])}}">Сформировать счет</a>
                                <a class="px-4" href="{{route('formQr', ['order_id' => $order->order_id])}}">Сформировать QR-код</a>

                            @if ($order->status==0)
                                    <a class="px-2" href="{{route('cancelOrder', ['order_id' => $order->order_id])}}">Отменить заказ</a>
                                @endif
                            </p>

                            @endif
                            <div  class="list-group-item list-group-item-action d-flex gap-3 py-1" aria-current="true">
                                <div class="d-flex gap-2 w-100 justify-content-between">
                                    <div>
                                        <h6 class="mb-0">{{$order->title}} </h6>
                                    </div>
                                    <small class="opacity-50 text-nowrap cable-price">{{$order->quantity}}м х {{$order->price}}₽</small>
                                    <small class="opacity-50 text-nowrap cable-price">{{($order->quantity*$order->price)}}₽</small>
                                    @php  $summ += $order->price*$order->quantity;  @endphp
                                </div>

                            </div>
                            @if (!isset($orders[$key+1]->order_id) || $orders[$key+1]->order_id!=$order->order_id)
                                <strong class="summ mt-3 text-end">Сумма: {{$summ}}₽</strong>
                        </div>
                    </div>
                </div>
            </div>

        </div>



                    @endif

                    @php $prevOrderId =  $order->order_id ; $i++; @endphp

                @endforeach

            @else
                <p>Заказов пока нет</p>
            @endif


        <h4 class="mt-4">Личные данные</h4>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Удалить аккаунт
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Вот так собака...</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h4>Действительно удалить аккаунт?</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ние</button>
                            <a href="{{route('deleteAccount')}}"><button type="button" class="btn btn-primary">Дыа</button></a>
                        </div>
                    </div>
                </div>
            </div>


    </div>
    </div>



@endsection('content')



