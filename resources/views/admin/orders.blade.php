
            <div class="container admin_account" id="account">

                <div class="list-group w-auto">
                    <div class="accordion">

                        @php  $i=0; @endphp
                        @if (!empty($orders))
                            @foreach($orders as $order)
                                @php  $summ = 0;   @endphp
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="panelsStayOpen-heading{{$order->order_id}}">
                                        <button class="accordion-button content-justify" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse{{$order->order_id}}" aria-expanded="true" aria-controls="panelsStayOpen-collapse{{$order->order_id}}">
                                            <h6 class="group-title">№{{$order->order_id}} от {{$order->created_at->format('d.m.y')}} </h6>
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

                                                @case(4)
                                                <p class="text-danger mt-2 px-2">Отменен</p>
                                                @break

                                            @endswitch
                                            <p class="mt-2 px-2">{{ $order->company_name }}   {{ $order->company_address}}</p>
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapse{{$order->order_id}}" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading{{$order->order_id}}">
                                        <div class="accordion-body">
                                            <div class="row ">
                                                <div  class="col-lg-6 col-sm-12 col-xs-12 col-md-6 ">
                                                    <form method="post" action="{{route('order.update')}}" >
                                                        @csrf
                                                        <input type="text" class="form-control" hidden  name="order_id" readonly value="{{$order->order_id}}">
                                                        @if (!empty($order->user))
                                                            <div class="row">

                                                                <div class="form-floating  col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                                    <input type="text" name="contact_name" disabled class="form-control rounded-3" id="name" value="{{$order->user->contact_name?:old('contact_name') }}">
                                                                    <label class="px-4" for="floatingInput">Имя</label>
                                                                </div>
                                                                <div class="form-floating   col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                                    <input type="text" name="phone"   class="form-control rounded-3" disabled id="phone" value="{{$order->user->phone?:old('phone')}}">
                                                                    <label class="px-4" for="floatingInput">Телефон</label>
                                                                </div>
                                                                <div class="form-floating col-lg-4 col-md-4 col-sm-12">
                                                                    <input type="email" name="email" disabled class="form-control rounded-3" id="email" value="{{$order->user->email }}" readonly>
                                                                    <label class="px-4" for="floatingInput">Email</label>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        <div class="row">

                                                            <div class="col-lg-12 mb-3">
                                                                <label class="px-4" for="address">Адрес</label>
                                                                <textarea  name="address"  class="form-control rounded-3"  id="address">{{$order->address}}</textarea>
                                                            </div>
                                                            <div class="col-lg-12 mb-3">
                                                                <label class="px-4" for="comment">Комментарий</label>
                                                                <textarea  name="comment"  class="form-control rounded-3"  id="comment">{{$order->comment}}</textarea>
                                                            </div>
                                                            <div class="col-lg-12 mb-3">
                                                                <label class="px-4" for="pay_link">Ссылка для оплаты</label>
                                                                <input  name="pay_link"  class="form-control rounded-3"  id="pay_link" value="{{$order->pay_link}}">
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col-6 mb-0">
                                                                @switch($order->status)
                                                                    @case(0)
                                                                    <div class="form-check mt-2">
                                                                        <input class="form-check-input form-control" type="checkbox" value="1" id="status" name="status">
                                                                        <label class="form-check-label" for="status">
                                                                            Заказ подтвержден
                                                                        </label>
                                                                    </div>

                                                                    @break

                                                                    @case(1)
                                                                    <div class="form-check mt-2">
                                                                        <input class="form-check-input form-control" type="checkbox" value="2" id="status" name="status">
                                                                        <label class="form-check-label" for="status">
                                                                            Заказ оплачен
                                                                        </label>
                                                                    </div>
                                                                    @break

                                                                    @case(2)
                                                                    <div class="form-check mt-2 ">
                                                                        <input class="form-check-input form-control" type="checkbox" value="3" id="status" name="status">
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
                                                            @if ($order->status==0 || $order->status==1)
                                                                <div class="col-12">
                                                                    <button type="button" class="btn btn-danger btn-order-delete" data-bs-toggle="modal" data-bs-target="#exampleModal{{$order->order_id}}">
                                                                        Отменить заказ
                                                                    </button>
                                                                </div>
                                                            @endif
                                                        </div>

                                                    </form>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal{{$order->order_id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$order->order_id}}" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel{{$order->order_id}}">Отменить заказ</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Действительно отменить заказ?

                                                                    <form action="{{route('order.cancel')}}" method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <div class="form-floating mb-3 mt-4">
                                                                            <input type="hidden" name="order_id" readonly value="{{$order->order_id}}">
                                                                            <textarea type="text" class="form-control rounded-3" name="cancel_comment"> </textarea>
                                                                            <label class="px-4" for="cancel_comment">Оставьте комментарий</label>
                                                                        </div>
                                                                        <button type="submit" class="btn btn-danger">Да</button>
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                    @foreach($order->cables as $cable)
                                                        <div  class="list-group-item list-group-item-action d-flex gap-3 py-1" aria-current="true">
                                                            <div class="d-flex gap-2 w-100 justify-content-between">
                                                                <div>
                                                                    <h6 class="mb-0">{{$cable->cable->title}} </h6>
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
                            @endforeach
                            {{$orders->links()}}

                        @else
                            <p>Заказов пока нет</p>
                        @endif
                    </div>


                    @if ($errors->any() && !$errors->has('action')  )
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible mt-1" role="alert">
                                <div>{{ $error }}</div>
                            </div>
                    @endforeach
                @endif

                </div>
                <script type="text/javascript">

                        $(".ajax-savechanges").on('click',function (e) {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            e.preventDefault();
                            var input = $(this);
                            var formData = {};
                            var form =input.closest('form');
                            form.find(".form-control").each(function() {
                                formData[$(this).attr("name")] = $(this).val();
                            });
                            console.log(formData);


                            var type = "POST";
                            var ajaxurl = 'update_order';
                            $.ajax({
                                type: type,
                                url: ajaxurl,
                                data: formData,
                                success: function (data) {
                                    input.val('Сохранено!');
                                },
                                error: function (data) {
                                    input.val('Возникла ошибка');
                                    console.log(data.responseText);
                                }
                            });
                        });

                </script>
            </div>



