    <div class="row border-bottom bottom-secondary pb-4">

        @if ($order->status==0)
            <div class="mb-4 text-start">В ближайшее время с Вами свяжется наш менеджер для подтверждения заказа. </div>
        @endif

        <div class="col-md-9">
            @php $summ =  0; $i=1; @endphp


            @foreach($order->cables as $cable )
                <div class="row border border-1 order-cable">
                    <div class="d-none d-sm-block col-sm-1  col-md-1 col-lg-1">{{$i}}</div>
                    <div class="col-6 col-sm-5 col-md-5 col-lg-7 fw-bold ">{{$cable->title}}</div>
                    <div class="col-3 col-sm-3 col-md-4 p-0 col-lg-2 text-end">{{$cable->pivot->quantity*$cable->pivot->footage}}м х {{$cable->pivot->price}}₽</div>
                    <div class="col-3 col-sm-3 col-md-2 col-lg-2 text-end {{$order->discount?'text-decoration-line-through':''}}">{{$order->getPivotSum($i-1)}}₽
                        @if($order->discount)
                            <span class="badge bg-success">{{ sprintf("%.2f",$order->getPivotSum($i-1,$order->discount ))}}₽ </span>
                        @endif
                    </div>
                </div>


                @php $i++;  @endphp
            @endforeach
            <h6 class="summ mt-2 text-dark fw-bold text-end">
                {{$order->discount?' Cкидка: '.$order->discount.'%':'' }}
                {{$order->delivery_cost?' Доставка: '. sprintf("%.2f",$order->delivery_cost).'₽':'' }}
            </h6>
            <h6 class="summ mt-0 text-dark fw-bold text-end">Итого: {{sprintf("%.2f",$order->totalSum)}}₽</h6>
        </div>
        <div class="col-md-3">

            @if ($order->status==1)
                <a target="_blank" href="{{route('order.invoice.show', ['order_id' => $order->id])}}"><button class="btn btn-secondary w-100 mb-2">Сформировать счет</button></a>

                @if ($order->pay_link)
                    <button type="button" class="btn btn-secondary mb-2 w-100" data-bs-toggle="modal" data-bs-target="#qrmodal{{$order->id}}">
                        Оплата по QR-коду
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="qrmodal{{$order->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-white text-uppercase" id="exampleModalLabel">Отсканируйте QR-код по ссылке:</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <a class="active" target="_blank" href="{{$order->pay_link}}">Перейти</a>
                                </div>

                            </div>
                        </div>
                    </div>
                @endif

            @endif

            @if ($order->status==0 || $order->status==1)

                <x-controls.modal classes="w-100"  label="Отменить заказ" >
                    <form action="{{route('order.cancel')}}" method="post">
                        @csrf
                        @method('delete')
                        <h4 class="text-white">Действительно отменить заказ?</h4>
                        <div class="form-floating mb-3 mt-4">
                            <input type="hidden" name="order_id" readonly value="{{$order->id}}">
                            <textarea type="text" class="form-control rounded-3" name="cancel_comment"> </textarea>
                            <label class="px-4" for="cancel_comment">Оставьте комментарий</label>
                        </div>
                        <button type="submit" class="btn btn-danger">Да</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    </form>
                </x-controls.modal>

            @endif
        </div>
            <div class="row mt-4 px-0">
                <div class="col-12 col-sm-6  form-floating">
                    @if ($order->comment)
                        <input type="text" class="form-control rounded-3 w-100" disabled value="{{$order->comment}}">
                        <label class="px-4 " for="floatingInput">Комментарий</label>
                    @endif
                </div>
                <div class="col-12 col-sm-6 form-floating">
                    @if ($order->address)
                        <input type="text" class="form-control rounded-3 w-100" disabled value="{{$order->address}}">
                        <label class="px-4 " for="floatingInput">Адрес доставки</label>
                    @endif
                </div>
            </div>


    </div>

