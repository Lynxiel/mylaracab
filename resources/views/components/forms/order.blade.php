
<div class="row">
    @if ($info->status==1)
        <div class="col-lg-3 col-sm-6 col-xs-6 mb-4">
            <a target="_blank" href="{{route('formInvoice', ['order_id' => $info->order_id])}}"><button class="btn btn-primary">Сформировать счет</button></a>
        </div>
        <div class="col-lg-4 col-sm-6 col-xs-6 mb-4">
            <!-- Button trigger modal -->
            @if ($info->pay_link)
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#qrmodal{{$info->order_id}}">
                    Получить QR-код
                </button>

                <!-- Modal -->
                <div class="modal fade" id="qrmodal{{$info->order_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">QR-код для оплаты через Ваше банковское приложение</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <a target="_blank" href="{{$info->pay_link}}">{{$info->pay_link}}</a>
                            </div>

                        </div>
                    </div>
                </div>
            @endif
        </div>

    @endif
    @if ($info->status==0)
        <div class="p-3 mb-2 bg-warning text-dark">В ближайшее время с Вами свяжется наш менеджер для подтверждения заказа. После этого станет доступна оплата и формирование счета.</div>
    @endif

    @if ($info->delivery_address)
        <div class="form-floating mb-3  col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control rounded-3" disabled value="{{$info->delivery_address}}">
            <label class="px-4" for="floatingInput">Адрес доставки</label>
        </div>
    @endif
    @if ($info->comment)
        <div class="form-floating mb-3  col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control rounded-3" disabled value="{{$info->comment}}">
            <label class="px-4" for="floatingInput">Комментарий</label>
        </div>
    @endif


    @php $summ =  0; @endphp
    @foreach($contents as $cable)
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

    @if ($info->status==0 || $info->status==1)

        <x-controls.modal label="Отменить заказ" >
            <form action="{{route('cancelOrder')}}" method="post">
                @csrf
                @method('PUT')
                <h4>Действительно отменить заказ?</h4>
                <p>Заказ будет удален из личного кабинета</p>
                <div class="form-floating mb-3 mt-4">
                    <input type="hidden" name="order_id" readonly value="{{$info->order_id}}">
                    <textarea type="text" class="form-control rounded-3" name="cancel_comment"> </textarea>
                    <label class="px-4" for="cancel_comment">Оставьте комментарий</label>
                </div>
                <button type="submit" class="btn btn-danger">Да</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
            </form>
        </x-controls.modal>

    @endif
</div>
