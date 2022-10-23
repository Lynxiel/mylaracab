@extends('voyager::master')

@section('page_title', __('voyager::generic.viewing').' '.__('voyager::generic.settings'))



@section('page_header')
    <h1 class="page-title">
        <i class="voyager-list"></i> Заказы
    </h1>

    <a class="text-white" href="{{route('orders') }}"><button class="btn btn-info "> Все </button></a>
    <a class="text-white" href="{{route('orders.filtered', ['status' =>0]) }}"><button class="btn btn-danger "> Созданные</button></a>
    <a   href="{{route('orders', ['status' =>1]) }}"><button class="btn btn-primary ">Подтвержденные</button></a>
    <a href="{{route('orders', ['status' =>2]) }}"><button class="btn btn-danger ">Оплаченные</button></a>
    <a href="{{route('orders', ['status' =>3]) }}"><button class="btn btn-success ">Завершенные</button></a>
    <a href="{{route('orders', ['status' =>4]) }}"><button class="btn btn-secondary">Отмененные</button></a>

@stop

@section('content')
        <div class="container-fluid" id="main-content">
        @include('voyager::alerts')

        @include('admin.orders')
    </div>



@stop


