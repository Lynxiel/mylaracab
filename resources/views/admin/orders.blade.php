@extends('voyager::master')

@section('page_title', __('voyager::generic.viewing').' '.__('voyager::generic.settings'))



@section('page_header')
    <h1 class="page-title">
        <i class="voyager-list"></i> Заказы
    </h1>

@stop

@section('content')
    <div class="container-fluid">
        @include('voyager::alerts')

            <div class="container admin_account" id="account">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-floating">
                            <input type="date" name="date_begin"  class="form-control rounded-3" id="date_begin" value="{{date("Y-m-d")}}">
                            <label class="px-4" for="date">Дата с</label>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-floating">
                            <input type="date" name="date_end"  class="form-control rounded-3" id="date_end" value="{{date("Y-m-d")}}">
                            <label class="px-4" for="date">Дата по</label>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label class="px-4" for="status_filter">Статус</label>
                        <select class="form-select" id="status_filter" aria-label="Default select example">
                            <option selected>Выбрать статус</option>
                            <option value="0">Создан</option>
                            <option value="1">Подтвержден</option>
                            <option value="2">Оплачен</option>
                            <option value="3">Завершен</option>
                        </select>
                    </div>
                </div>
                <div class="list-group w-auto">
                    @php  $summ = 0; $i=1; @endphp
                    @if (isset($orders[0]->order_id))
                        @foreach($orders as $key=>$order)
                            @if (!isset($prevOrderId) || $prevOrderId!=$order->order_id)
                                @php  $summ = 0;  @endphp

                                <div class="accordion" >
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-heading{{$i}}">
                                            <button class="accordion-button content-justify" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse{{$i}}" aria-expanded="true" aria-controls="panelsStayOpen-collapse{{$i}}">
                                                <h6 class="group-title">№{{$order->order_id}} от {{$order->created_at}} </h6>
                                                    @switch($order->status)
                                                        @case(0)
                                                        <p class="text-danger mt-2 px-2"> Создан </p>
                                                        @break

                                                        @case(1)
                                                        <p class="text-primary mt-2 px-2">Подтвержден, ожидает оплаты</p>
                                                        @break

                                                        @case(2)
                                                        <p class="text-success mt-2 px-2">Оплачен</p>
                                                        @break

                                                        @case(3)
                                                        <p class="text-light mt-2 px-2">Завершен</p>
                                                        @break

                                                    @endswitch
                                                  <p class="mt-2 px-2">{{ $order->company_name }}   {{ $order->company_address}}</p>
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapse{{$i}}" class="accordion-collapse collapse {{ ($i==1?'show':'') }}" aria-labelledby="panelsStayOpen-heading{{$i}}">
                                            <div class="accordion-body">
                                                <div class="row ">
                                                    <div  class="col-lg-6 col-sm-12 col-xs-12 col-md-6 ">
                                                        <form method="post" action="{{route('updateOrder')}}" >
                                                            @csrf
                                                            @if (!empty($order->email))
                                                            <div class="row">
                                                                <input type="text" hidden name="order_id" readonly value="{{$order->order_id}}">

                                                                <div class="form-floating  col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                                    <input type="text" name="contact_name" disabled class="form-control rounded-3" id="name" value="{{$order->contact_name?:old('contact_name') }}">
                                                                    <label class="px-4" for="floatingInput">Имя</label>
                                                                </div>
                                                                <div class="form-floating   col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                                    <input type="text" name="phone"   class="form-control rounded-3" disabled id="phone" value="{{$order->phone?:old('phone')}}">
                                                                    <label class="px-4" for="floatingInput">Телефон</label>
                                                                </div>
                                                                <div class="form-floating col-lg-4 col-md-4 col-sm-12">
                                                                    <input type="email" name="email" disabled class="form-control rounded-3" id="email" value="{{$order->email }}" readonly>
                                                                    <label class="px-4" for="floatingInput">Email</label>
                                                                </div>
                                                            </div>
                                                            @endif
                                                            <div class="row">

                                                                <div class="col-lg-12 mb-3">
                                                                    <label class="px-4" for="floatingInput">Адрес</label>
                                                                    <textarea  name="address"  class="form-control rounded-3"  id="address">{{$order->delivery_address}}</textarea>
                                                                </div>
                                                                <div class="col-lg-12 mb-3">
                                                                    <label class="px-4" for="floatingInput">Комментарий</label>
                                                                    <textarea  name="comment"  class="form-control rounded-3"  id="comment">{{$order->comment}}</textarea>
                                                                </div>
                                                                <div class="col-lg-12 mb-3">
                                                                    <label class="px-4" for="floatingInput">Ссылка для оплаты</label>
                                                                    <input  name="pay_link"  class="form-control rounded-3"  id="pay_link" value="{{$order->pay_link}}">
                                                                </div>
                                                            </div>
                                                            <div class="row mt-2">
                                                                <div class="col-6 mb-0">
                                                                    @switch($order->status)
                                                                        @case(0)
                                                                        <div class="form-check mt-2">
                                                                            <input class="form-check-input" type="checkbox" value="1" id="status" name="status">
                                                                            <label class="form-check-label" for="status">
                                                                                Заказ подтвержден
                                                                            </label>
                                                                        </div>

                                                                        @break

                                                                        @case(1)
                                                                        <div class="form-check mt-2">
                                                                            <input class="form-check-input" type="checkbox" value="2" id="status" name="status">
                                                                            <label class="form-check-label" for="status">
                                                                                Заказ оплачен
                                                                            </label>
                                                                        </div>
                                                                        @break

                                                                        @case(2)
                                                                        <div class="form-check mt-2 ">
                                                                            <input class="form-check-input" type="checkbox" value="3" id="status" name="status">
                                                                            <label class="form-check-label" for="status">
                                                                                Заказ завершен
                                                                            </label>
                                                                        </div>
                                                                        @break

                                                                        @case(3)
                                                                        <p class="mt-2">Завершен</p>
                                                                        @break

                                                                    @endswitch
                                                                </div>
                                                                <div class="col-6">
                                                                    <input type="submit" class="btn btn-success" value="Сохранить изменения">
                                                                </div>
                                                                @if ($order->status==0)
                                                                    <div class="col-12">
                                                                        <button type="button" class="btn btn-danger btn-order-delete" data-bs-toggle="modal" data-bs-target="#exampleModal{{$i}}">
                                                                            Удалить заказ
                                                                        </button>
                                                                    </div>
                                                                @endif
                                                            </div>

                                                        </form>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal{{$i}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$i}}" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel{{$i}}">Modal title</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Действительно удалить заказ?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                                                        <a href="{{route('cancelOrder',['order_id'=>$order->order_id])}}"> <button type="button" class="btn btn-danger">Удалить</button></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>




                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
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

                                </div>



                            @endif

                            @php $prevOrderId =  $order->order_id ; $i++; @endphp

                        @endforeach

                    @else
                        <p>Заказов пока нет</p>
                    @endif


                    @if ($errors->any() && !$errors->has('action')  )
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible mt-1" role="alert">
                                <div>{{ $error }}</div>
                            </div>
                    @endforeach
                @endif

                </div>
                <script>
                    jQuery("#date_begin, #date_end").onchange(function (e) {
                        alert(1);
                        jQuery.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        e.preventDefault();
                        var formData = {
                            date_begin: jQuery('#date_begin').val(),
                            date_end: jQuery('#date_end').val(),
                        };
                        var type = "POST";
                        var ajaxurl = 'orders';
                        jQuery.ajax({
                            type: type,
                            url: ajaxurl,
                            data: formData,
                            dataType: 'json',
                            success: function (data) {
                                alert(2);
                            },
                            error: function (data) {
                                console.log(data);
                            }
                        });
                    });
                </script>
            </div>

@stop


