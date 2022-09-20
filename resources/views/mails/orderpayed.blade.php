<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Поступила оплата Kabelopt71.ru</title>

</head>
<body class="antialiased">
По заказу №{{$order->order_id}} от {{$order->created_at}} поступила оплата.

</body>
@include('mails.footer')
</html>
