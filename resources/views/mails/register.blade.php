<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Учетные данные для входа Kabelopt71.ru</title>
</head>
<body class="antialiased">
    <div>Для доступа в Ваш личный кабинет используйте учетные данные:</div>
    <div>Email: {{$email}}</div>
    <div>Телефон: {{$phone}}</div>
    <div>Пароль: {{$password}}</div>
</body>
@include('mails.footer')
</html>
