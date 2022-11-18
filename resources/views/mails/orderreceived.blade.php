<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Новый заказ на сайте Kabelopt71.ru</title>

</head>
<body class="antialiased">
Заказ №{{$order->id}}
@if ($user)
Пользователь: {{$user->email}} {{$user->phone}} {{$user->contact_name}}
@endif

@php $sum=0; $n=1; @endphp
@foreach ($order->cables as $item)

    @php $sum += $item->pivot->quantity*$item->pivot->price*$item->pivot->footage @endphp
    <div class="list-group w-auto">
        <div class="row ">
            <div class="col-md-12">
                <div  class="list-group-item list-group-item-action d-flex " aria-current="true">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:27px;color:#666666;font-size:12px">
                            {{$n++}}. {{$item->title}}
                            {{$item->pivot->price}}₽ х  {{$item->pivot->footage*$item->pivot->quantity}}м
                            {{$item->pivot->price*$item->pivot->footage*$item->pivot->quantity}}₽
                        </p>
                        <hr>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endforeach
Сумма: {{$sum}}₽
</body>

</html>
