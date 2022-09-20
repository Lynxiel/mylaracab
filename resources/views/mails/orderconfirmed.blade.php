<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ваш заказ подтвержден Kabelopt71.ru</title>

</head>
<body class="antialiased">
Ваш заказ №{{$order->order_id}} от {{$order->created_at}} был подтвержден! Теперь Вам доступна оплата заказа в личном кабинете по Qr-коду или с помощью счета.
@if ($order->comment)
    <p>Комментарий к заказу: {{$order->comment}}</p>
@endif
@if ($order->address)
    <p>Адрес доставки: {{$order->address}}</p>
@endif
@if ($order->pay_link)
    <p>Ссылка для оплаты: <a href="{{$order->pay_link}}">{{$order->pay_link}}</a></p>
@endif

</body>
@include('mails.footer')

</html>
