<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Заказ отменен Kabelopt71.ru</title>

</head>
<body class="antialiased">
Заказ №{{$order->order_id}} от {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $order->created_at)->format('d.m.y')}} был отменен!
@if ($user)
Пользователь: {{$user->email}} {{$user->phone}} {{$user->contact_name}}
@endif
</body>

</html>
