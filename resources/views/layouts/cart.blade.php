@extends('layouts.layout')
@section('cart_content')

<div class="modal fade" id="CartModal" tabindex="-1" aria-labelledby="CartModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Корзина</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-primary">Оформить</button>
            </div>
        </div>
    </div>
</div>

@endsection('cart_content')
