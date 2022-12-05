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
    <link rel="icon" href="{{ url('images/favicon.png') }}">
    <link rel="stylesheet" href="{{asset('css/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.min.css')}}">
    <script src="{{asset('/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('/js/jquery.min.js')}}"></script>
    <script src="{{asset('/js/app.min.js')}}"></script>
    <script src="{{asset('/js/jquery.maskedinput.min.js')}}"></script>
    {{$slot}}


</head>

