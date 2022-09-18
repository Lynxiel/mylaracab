<div class="accordion" >
    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-heading{{$orderdata->order_id}}">
            <button class="accordion-button content-justify" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse{{$orderdata->order_id}}" aria-expanded="true" aria-controls="panelsStayOpen-collapse{{$orderdata->order_id}}">
                <h6 class="group-title">№{{$orderdata->order_id}} от {{$orderdata->created_at}} </h6>
                @switch($orderdata->status)
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
                <p class="mt-2 px-2">{{ $orderdata->company_name }}   {{ $orderdata->company_address}}</p>
            </button>
        </h2>
        <div id="panelsStayOpen-collapse{{$orderdata->order_id}}" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading{{$orderdata->order_id}}">
            <div class="accordion-body">
                <div class="row ">
                    <div  class="col-lg-6 col-sm-12 col-xs-12 col-md-6 ">
                        <form method="post" action="{{route('updateOrder')}}" >
                            @csrf
                            <input type="text" hidden name="order_id" readonly value="{{$orderdata->order_id}}">
                            @if (!empty($orderdata->email))
                                <div class="row">

                                    <div class="form-floating  col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <input type="text" name="contact_name" disabled class="form-control rounded-3" id="name" value="{{$orderdata->contact_name?:old('contact_name') }}">
                                        <label class="px-4" for="floatingInput">Имя</label>
                                    </div>
                                    <div class="form-floating   col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <input type="text" name="phone"   class="form-control rounded-3" disabled id="phone" value="{{$orderdata->phone?:old('phone')}}">
                                        <label class="px-4" for="floatingInput">Телефон</label>
                                    </div>
                                    <div class="form-floating col-lg-4 col-md-4 col-sm-12">
                                        <input type="email" name="email" disabled class="form-control rounded-3" id="email" value="{{$orderdata->email }}" readonly>
                                        <label class="px-4" for="floatingInput">Email</label>
                                    </div>
                                </div>
                            @endif
                            <div class="row">

                                <div class="col-lg-12 mb-3">
                                    <label class="px-4" for="address">Адрес</label>
                                    <textarea  name="address"  class="form-control rounded-3"  id="address">{{$orderdata->delivery_address}}</textarea>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label class="px-4" for="comment">Комментарий</label>
                                    <textarea  name="comment"  class="form-control rounded-3"  id="comment">{{$orderdata->comment}}</textarea>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label class="px-4" for="pay_link">Ссылка для оплаты</label>
                                    <input  name="pay_link"  class="form-control rounded-3"  id="pay_link" value="{{$orderdata->pay_link}}">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-6 mb-0">
                                    @switch($orderdata->status)
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
                                    <input type="submit" class="btn btn-success ajax-savechanges" value="Сохранить изменения">
                                </div>
                                @if ($orderdata->status==0)
                                    <div class="col-12">
                                        <button type="button" class="btn btn-danger btn-order-delete" data-bs-toggle="modal" data-bs-target="#exampleModal{{$orderdata->order_id}}">
                                            Удалить заказ
                                        </button>
                                    </div>
                                @endif
                            </div>

                        </form>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{$orderdata->order_id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$orderdata->order_id}}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel{{$orderdata->order_id}}">Удаление заказа</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Действительно удалить заказ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                        <a href="{{route('cancelOrder',['order_id'=>$orderdata->order_id])}}"> <button type="button" class="btn btn-danger">Удалить</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
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
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
