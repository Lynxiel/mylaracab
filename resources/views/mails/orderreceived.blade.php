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
</body>

</html>
