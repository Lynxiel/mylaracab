@props([
    'route',
    'classes',
    'text',
    'color' => 'white'
])

@php
    if (Illuminate\Support\Facades\Route::currentRouteName()==$route) {$classes.= ' active'; }
    else{$classes.= ' text-'. $color;}
@endphp

<li><a href="{{route($route)}}" class="{{$classes}} ">{{$text}}</a></li>
