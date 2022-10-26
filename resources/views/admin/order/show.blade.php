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
