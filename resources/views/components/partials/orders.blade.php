@props([
    'orders',
    'title'
])

@if (isset($title))
    <h2 class="mb-4">{{$title}}</h2>
@endif
@php  $i=0; @endphp
@if (!empty($orders))
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">№</th>
                <th scope="col">Дата</th>
                <th scope="col">Сумма</th>
                <th scope="col">Статус</th>
                <th scope="col">Email</th>
                <th scope="col">Телефон</th>

                <th scope="col">Контактное лицо</th>
                <th scope="col">Имя компании</th>
                <th scope="col">Комментарий</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)

                @php  $summ =$order->delivery_cost+ $order->cables->sum(function($cable)
                    { return $cable->pivot->quantity*$cable->pivot->price*$cable->pivot->footage ;})

                @endphp
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->created_at->format('d.m.y')}}</td>
                    <td>{{$summ}}₽ {{$order->delivery_cost}}</td>
                    <td><a href="{{route('orders.edit',['order'=>$order->id])}}">{{$order->getStatusTitle($order->status)}}</a></td>

                    <td>{{$order->user->email??''}}</td>
                    <td>{{$order->user->phone??''}}</td>

                    <td>{{$order->user->name??''}}</td>
                    <td>{{$order->user->company_name??''}}</td>
                    <td>{{$order->comment}}</td>

                </tr>

            @endforeach
            @if (property_exists($orders, 'perPage') ){{$orders->links()}} @endif
            @else
                <p>Заказов пока нет</p>
            @endif
            </tbody>
        </table>
    </div>
