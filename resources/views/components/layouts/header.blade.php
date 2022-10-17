@props([
    'title',
    'description'=>'',
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{$description}}"/>
    <title>{{ isset($title)?$title:$_ENV['APP_NAME'] }}</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap/dist/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">


    <script src="{{asset('/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('/js/jquery.js')}}"></script>
    <script src="{{asset('/js/app.js')}}"></script>
    <script src="{{asset('/js/jquery.maskedinput.js')}}"></script>


</head>

