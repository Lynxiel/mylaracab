@extends('layouts.layout')
@section('content')

    <div class="container" id="account">
        <h2 class="mt-4 text-center">Личный кабинет</h2>
        <h4>История заказов</h4>


        <div class="list-group w-auto">
            @php  $summ = 0; $i=1; @endphp
            @if (!empty($orders))
                @foreach($orders as $order)
                        @php  $summ = 0;
                                $orderdata = $order[0];
                        @endphp

        <div class="accordion" >
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-heading{{$orderdata->order_id}}">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse{{$orderdata->order_id}}" aria-expanded="true" aria-controls="panelsStayOpen-collapse{{$orderdata->order_id}}">
                        <h6 class="group-title">№{{$orderdata->order_id}} от {{$orderdata->created_at}} -  @switch($orderdata->status)
                                @case(0)
                                Создан
                                @break

                                @case(1)
                                Подтвержден, ожидает оплаты
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
                <div id="panelsStayOpen-collapse{{$orderdata->order_id}}" class="accordion-collapse collapse " aria-labelledby="panelsStayOpen-heading{{$orderdata->order_id}}">
                    <div class="accordion-body">
                        <div class="row ">
                                @if ($orderdata->status==1)
                                <a target="_blank" href="{{route('formInvoice', ['order_id' => $orderdata->order_id])}}"><button class="btn btn-primary">Сформировать счет</button></a>
                                    <!-- Button trigger modal -->
                                    @if ($orderdata->pay_link)
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#qrmodal">
                                            Получить QR-код
                                        </button>

                                        <!-- Modal -->
                                    <div class="modal fade" id="qrmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">QR-код для оплаты через Ваше банковское приложение</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <a href="{{$orderdata->pay_link}}">{{$orderdata->pay_link}}</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                                @if ($orderdata->status==0)
                                    <div class="p-3 mb-2 bg-warning text-dark">В ближайшее время с Вами свяжется наш менеджер для подтверждения заказа. После этого станет доступна оплата и формирование счета.</div>
                                @endif

                                @if ($orderdata->delivery_address)
                                    <div class="form-floating mb-3  col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control rounded-3" disabled value="{{$orderdata->delivery_address}}">
                                        <label class="px-4" for="floatingInput">Адрес доставки</label>
                                    </div>
                                @endif
                                @if ($orderdata->comment)
                                    <div class="form-floating mb-3  col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control rounded-3" disabled value="{{$orderdata->comment}}">
                                        <label class="px-4" for="floatingInput">Комментарий</label>
                                    </div>
                                @endif


                            @foreach($order as $cable)
                                <div  class="list-group-item list-group-item-action d-flex gap-3 py-1" aria-current="true">
                                    <div class="d-flex gap-2 w-100 justify-content-between">
                                        <div>
                                            <h6 class="mb-0">{{$cable->title}} </h6>
                                        </div>
                                        <small class="opacity-50 text-nowrap cable-price">{{$cable->quantity}}м х {{$cable->price}}₽</small>
                                        <small class="opacity-50 text-nowrap cable-price">{{($cable->quantity*$cable->price)}}₽</small>
                                        @php  $summ += $cable->price*$cable->quantity;  @endphp
                                    </div>
                                </div>
                            @endforeach
                                <strong class="summ mt-3 text-end">Сумма: {{$summ}}₽</strong>

                                        @if ($orderdata->status==0)
                                            <a class="px-2" href="{{route('cancelOrder', ['order_id' => $orderdata->order_id])}}"><button class="btn btn-danger">Отменить заказ</button></a>
                                        @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
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



