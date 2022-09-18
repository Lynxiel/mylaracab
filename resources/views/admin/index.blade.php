@extends('voyager::master')

@section('page_title', __('voyager::generic.viewing').' '.__('voyager::generic.settings'))



@section('page_header')
    <h1 class="page-title">
        <i class="voyager-list"></i> Заказы
    </h1>

@stop

@section('content')
        <div class="container-fluid" id="main-content">
        @include('voyager::alerts')

        @include('admin.orders')
    </div>



@stop


