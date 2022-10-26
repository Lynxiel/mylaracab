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
                @php  $summ = 0;   @endphp
                <tr>
                    <td><a href="{{route('orders.edit',['order'=>$order->order_id])}}">{{$order->order_id}}</a></td>
                    <td>{{$order->created_at->format('d.m.y')}}</td>
                    <td>сумма</td>
                    <td>@switch($order->status)
                            @case(0)
                            <p class="text-danger m-0 p-0"> Создан </p>
                            @break

                            @case(1)
                            <p class="text-primary  m-0 p-0">Подтвержден, ожидает оплаты</p>
                            @break

                            @case(2)
                            <p class="text-success  m-0 p-0">Оплачен</p>
                            @break

                            @case(3)
                            <p class="text-light  m-0 p-0">Завершен</p>
                            @break

                            @case(4)
                            <p class="text-danger  m-0 p-0">Отменен</p>
                            @break

                        @endswitch</td>

                    <td>{{$order->user->email??''}}</td>
                    <td>{{$order->user->phone??''}}</td>

                    <td>{{$order->user->contact_name??''}}</td>
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
