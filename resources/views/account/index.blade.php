@extends('layouts.layout')
@section('content')

    <div class="container" id="account">
        <h2 class="mt-4 text-center">Личный кабинет</h2>
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

                                <a class="px-4" target="_blank" href="{{route('formInvoice', ['order_id' => $order->order_id])}}">Сформировать счет</a>
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


            <div class="row panel-heading">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 offset-md-4">
                    <h4 class="mt-4">Личные данные</h4>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 mt-4">

                </div>



            </div>

            <form method="post" action="{{route('saveUserData')}}" class="mt-4">
                @csrf
                <div class="row">

                    <div class="form-floating mb-3 col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <input type="text" name="contact_name" required class="form-control rounded-3" id="name" value="{{$user->contact_name?:old('contact_name') }}">
                        <label class="px-4" for="floatingInput">Имя контактного лица</label>
                    </div>
                    <div class="form-floating mb-3  col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <input type="text" name="phone"  required class="form-control rounded-3" disabled id="phone" value="{{$user->phone?:old('phone')}}">
                        <label class="px-4" for="floatingInput">Телефон</label>
                    </div>
                    <div class="form-floating mb-3 col-lg-4 col-md-4 col-sm-12">
                        <input type="email" name="email" required class="form-control rounded-3" id="email" value="{{$user->email }}" readonly>
                        <label class="px-4" for="floatingInput">Email</label>
                    </div>
                </div>
                @if (!isset($user->company_name))
                <div class=" alert alert-success">
                    <h6>Для формирования счета с корректными реквизитами плательщика заполните поля ниже:</h6>
                </div>
                @endif
                <div class="row">
                    <div class="form-floating mb-3 col-8">
                        <input type="text" name="company_name"  class="form-control rounded-3" id="company_name" value="{{$user->company_name?:old('company_name')}}">
                        <label class="px-4" for="floatingInput">Название компании </label>
                    </div>
                    <div class="form-floating mb-3 col-4">
                        <input type="number" name="postcode"  class="form-control rounded-3" id="postcode" value="{{$user->postcode?:old('postcode')}}">
                        <label class="px-4" for="floatingInput">Индекс </label>
                    </div>
                </div>

                <div class="row">

                    <div class="form-floating mb-3 col-12">
                        <textarea  name="address"  class="form-control rounded-3" id="address" >{{$user->address?:old('address')}}</textarea>
                        <label class="px-4" for="floatingInput">Юридический адрес </label>
                    </div>

                </div>

                <div class="col-12">
                    <input type="submit" class="btn btn-success" value="Сохранить изменения">
                </div>

            </form>

            @if ($errors->any() && !$errors->has('action')  )
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible mt-1" role="alert">
                        <div>{{ $error }}</div>
                    </div>
                @endforeach
            @endif


            <!-- Button trigger modal -->
            <button type="button" class="btn btn-secondary mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
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


    </form>
    </div>



@endsection('content')



