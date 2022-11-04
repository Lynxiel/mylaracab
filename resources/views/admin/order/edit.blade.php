<x-layouts.header/>
<x-layouts.nav >
    <x-controls.list text="Заказы" route="orders.index" classes="nav-link px-2 "/>
    <x-controls.list text="Товары" route="cables.index" classes="nav-link px-2 "/>
</x-layouts.nav>

<div class="content-container bg-light">
    <div class="px-4 py-5 mt-5  container">
        <h2 class="mb-4">Редактировать заказ №{{$order->order_id}} от {{$order->created_at->format('d-m-y')}}
        <span class="badge bg-primary text-end px-4">{{$order->getStatusTitle($order->status)}}</span></h2>
        @if (!empty($order->user))

            <ul class="list-group list-group-horizontal mb-2 w-100">
                <li class="list-group-item">{{old('contact_name') ?? $order->user->contact_name }}</li>
                <li class="list-group-item">{{old('phone')??$order->user->phone }}</li>
                <li class="list-group-item">{{$order->user->email }}</li>
            </ul>
        @endif
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                <form method="post" action="{{route('orders.update', ['order'=>$order->order_id])}}" >
                    @method('PUT')
                    @csrf

                    <div class="row">

                        <div class="col-lg-12 mb-3">
                            <label class="px-4" for="address">Адрес</label>
                            <textarea  name="address"  class="form-control rounded-3"  id="address">{{$order->address}}</textarea>
                            @error('address')
                            <div class="alert alert-danger mt-1">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-12 mb-3">
                            <label class="px-4" for="comment">Комментарий</label>
                            <textarea  name="comment"  class="form-control rounded-3"  id="comment">{{$order->comment}}</textarea>
                            @error('comment')
                            <div class="alert alert-danger mt-1">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-12 mb-3">
                            <label class="px-4" for="pay_link">Ссылка для оплаты</label>
                            <input  name="pay_link"  class="form-control rounded-3"  id="pay_link" value="{{$order->pay_link}}">
                            @error('pay_link')
                            <div class="alert alert-danger mt-1">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="col-12 mb-3">
                            <div class="form-check mt-2">
                                <input  type="checkbox" value="{{$order->status+1}}" id="status" name="status">
                                <label class="form-check-label" for="status">
                                    {{$order->getStatusTitle($order->status+1)}}
                                </label>
                            </div>
                        </div>
                        <div class="col-6">
                            <input type="submit" class="btn btn-success" value="Сохранить изменения">
                        </div>
                        @if ($order->status==0 || $order->status==1)
                            <div class="col-6 text-end">

                                <x-controls.modal label="Отменить заказ" heading="Отменить заказ?" >
                                    @include('admin.order.cancel')
                                </x-controls.modal>

                            </div>
                        @endif
                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                @php $sum = 0; $i=1; @endphp
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th scope="col">№</th>
                            <th scope="col">Название</th>
                            <th scope="col">Количество</th>
                            <th scope="col">Цена</th>
                            <th scope="col">Сумма</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($order->cables as $cable)
                                <tr>
                                    <td class="py-2">{{$i++}}</td>
                                    <td class="py-2">{{$cable->cable->title}}</td>
                                    <td class="py-2">{{$cable->quantity}}м</td>
                                    <td class="py-2">{{sprintf("%.2f",$cable->price)}}₽</td>
                                    <td class="py-2">{{sprintf("%.2f",$cable->quantity*$cable->price)}}₽</td>
                                </tr>

                                        @php  $sum += $cable->price*$cable->quantity;  @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <strong class="summ mt-3 text-end">Сумма: {{sprintf("%.2f",$sum)}}₽</strong>
            </div>
        </div>

    </div>
</div>
<div class="container">
    @include('admin.partials.flashmessages')
</div>

</body>
