<x-layouts.header/>
<x-layouts.nav-back />

<div class=" bg-light">
    <div class="px-4 py-3   container">
        @include('admin.partials.flashmessages')
        <a class="btn btn-secondary text-end mb-3" href="{{route('orders.index')}}">Назад</a>
        <h2 class="my-4 px-4 d-inline">Редактировать заказ №{{$order->id}} от {{$order->created_at->format('d-m-y')}}</h2>
        <span class="badge bg-primary text-end fs-4 mb-4">{{$order->getStatusTitle($order->status)}}</span>

        <div class="row">
            <div class="col-12">
                @php  $i=1; @endphp
                <div class="table-responsive">
                    <table class="table table-striped table-sm pivot-sync">
                        <thead>
                        <tr>
                            <th scope="col">№</th>
                            <th scope="col">Название</th>
                            <th scope="col">Количество</th>
                            <th scope="col">Цена</th>
                            <th scope="col">Сумма</th>
                            @can('cable-order-edit', $order)
                                <th scope="col">Удалить</th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->cables as $cable)
                            <tr>
                                <td class="py-2">{{$i}}</td>
                                <td class="py-2">{{$cable->title}}</td>
                                <td class="py-2">{{$cable->pivot->quantity}}*{{$cable->pivot->footage}}м</td>
                                <td class="py-2">{{sprintf("%.2f",$cable->pivot->price)}}₽</td>
                                <td class="py-2 cable-sum {{$order->discount?'text-decoration-line-through':''}}" >{{sprintf("%.2f",$order->getPivotSum($i-1))}}₽
                                    @if($order->discount)
                                        <span class="badge bg-success">{{$order->getPivotSum($i-1,$order->discount )}}₽ </span>
                                    @endif
                                </td>
                                @can('cable-order-edit', $order)
                                    <td class="py-2 px-3">
                                        <form method="post" action="{{route('orders.pivot.detach',['order_id'=>$order->id])}}">
                                            @method('delete')
                                            @csrf
                                            <input type="text" hidden name="cable_id" value="{{$cable->id}}">
                                            <input class="btn btn-warning btn-remove-cart" type="submit" value="Х">

                                        </form>

                                    </td>
                                @endcan
                            </tr>
                            @php $i++; @endphp
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="col-12 col-sm-12 text-end">
                        <span class="px-4 order-sum mt-3 fw-bold  text-end">Доставка: {{sprintf("%.2f",$order->delivery_cost)}}₽</span>
                        <span class="px-4 order-sum mt-3 fw-bold  text-end">Итого: {{sprintf("%.2f", $order->totalSum)}}₽</span>

                    </div>
                    <div class="col-12 col-sm-12 text-sm-end mt-2 mt-2 text-end">
                        @can('cable-order-edit', $order)
                            <x-controls.modal label="Добавить кабель" classes="text-start" >
                                <form method="post" action="{{route('orders.pivot.attach',['order_id'=>$order->id])}}">
                                    @method('PATCH')
                                    @csrf
                                    <h2 class="text-white mb-3">Добавить к заказу</h2>
                                    <x-controls.select name="cable_id" :fieldname="['title', 'footage', 'price']" class="mb-3" nullable="0" title="Выберите кабель" :options="$cables"></x-controls.select>
                                    <div class="form-floating mb-3">
                                        <x-controls.input label="Количество бухт"  name="quantity" value="" required="1" />
                                    </div>
                                    <button class="btn btn-orange btn-add-row">Добавить</button>
                                </form>
                            </x-controls.modal>
                            @endcan
                    </div>
                </div>


            </div>


            <div class="col-12 ">
                <h2>Данные заказа</h2>
                @if (!empty($order->user))
                <div class="row mb-3">
                    <div class="col-12 col-sm-4 mt-2 mt-sm-0"><input type="text" class="form-control rounded-3" readonly value=" {{$order->user->name }}"></div>
                    <div class="col-12 col-sm-4 mt-2 mt-sm-0"><input type="text" class="form-control rounded-3" readonly value=" {{$order->user->phone }}"></div>
                    <div class="col-12 col-sm-4 mt-2 mt-sm-0"><input type="text" class="form-control rounded-3" readonly value="{{$order->user->email }}"></div>
                </div>
                @endif
                <form method="post" action="{{route('orders.update', ['order'=>$order->id])}}" >
                    @method('PUT')
                    @csrf

                    <div class="row">

                        <div class="form-floating mb-3 col-12 col-md-6">
                            <textarea  id="address" name="address" class="form-control rounded-3" id="address">{{$order->address}}</textarea>
                            <label class="px-4" for="floatingInput">Адрес </label>
                            @error('address')
                            <div class="alert alert-danger mt-1">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="col-12 col-md-6 mb-3">
                            <div class="row">
                                <div class="col-6 form-floating">
                                    <x-controls.input  name="delivery_cost"  class="form-control rounded-3"  id="delivery_cost" value="{{$order->delivery_cost}}" />
                                    <label class="px-4" for="floatingInput">Стоимость доставки, ₽.</label>
                                </div>
                                <div class="col-6 form-floating">
                                    <x-controls.input  name="discount"  class="form-control rounded-3"  id="discount" value="{{$order->discount}}" />
                                    <label class="px-4" for="floatingInput">Скидка, %</label>
                                </div>
                            </div>

                        </div>



                        <div class="col-12 col-md-6 mb-3 form-floating">
                            <textarea  name="comment"  class="form-control rounded-3"  id="comment">{{$order->comment}}</textarea>
                            <label class="px-4" for="floatingInput">Комментарий</label>
                            @error('comment')
                            <div class="alert alert-danger mt-1">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6 mb-3 form-floating">
                            <input  name="pay_link"  class="form-control rounded-3"  id="pay_link" value="{{$order->pay_link}}">
                            <label class="px-4" for="floatingInput">Ссылка для оплаты</label>
                            @error('pay_link')
                            <div class="alert alert-danger mt-1">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        @if ($order->status<\App\Models\Order::CANCELED)
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-check mt-2 px-0">
                                    <input  type="checkbox" value="{{$order->status+1}}" id="status" name="status">
                                    <label class="form-check-label" for="status">
                                        {{$order->getStatusTitle($order->status+1)}}
                                    </label>
                                </div>
                            </div>
                        @endif
                        <div class="col-12">
                            <input type="submit" class="btn btn-success" value="Сохранить изменения">
                        </div>
                    </div>
                </form>
                @if ($order->status==0 || $order->status==1)
                    <div class="col-12 text-start mt-4">

                        <x-controls.modal label="Отменить заказ" heading="Отменить заказ?" >

                            @include('admin.order.cancel')
                        </x-controls.modal>

                    </div>
                @endif
            </div>

        </div>

    </div>
</div>




</body>

