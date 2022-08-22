    <div class="modal fade" id="CartModal" tabindex="-1" aria-labelledby="CartModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Корзина</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="cart-container">

                    @if (!empty($cart))
                        <?php $sum=0; ?>
                        @foreach ($cart as $item)
                            <?php $sum += $item->price*(session()->get('cable_id')?session()->get('cable_id')[$item->cable_id]:100); ?>
                            <div class="list-group w-auto">
                                <div class="row ">
                                    <div class="col-md-12">
                                        <div  class="list-group-item list-group-item-action d-flex " aria-current="true">
                                            <div class="d-flex gap-2 w-100 justify-content-between">
                                                <div>
                                                    <h6 class="mb-0">{{$item->title}} </h6>
                                                    <p class="mb-0 opacity-75">Доступно: {{$item->instock}}м</p>
                                                </div>
                                                <small class="opacity-50 text-nowrap cable-price">{{$item->price}}₽</small>

                                                <form method="post" action="{{route('updateQuantity')}}">
                                                    @csrf
                                                    <input  required name="cable_id" readonly value="{{$item->cable_id}}" hidden>
                                                    <input type="number" step="100"  id="quantity" onchange="this.closest('form').submit()" class="form-control-sm" required name="quantity"  value="{{ session()->get('cable_id')?session()->get('cable_id')[$item->cable_id]:100}}">
                                                </form>
                                                <form method="post" action="{{route('removeFromCart')}}">
                                                    @csrf
                                                    <input  required name="cable_id" readonly value="{{$item->cable_id}}" hidden>
                                                    <small class=" cable-summ text-muted text-center">{{$item->price*(session()->get('cable_id')?session()->get('cable_id')[$item->cable_id]:100)}}₽</small>
                                                    <button type="submit" class="btn btn-outline-danger btn-remove-cart">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                        <div class="mt-1">
                            <small class="col-3">Ожидаемая дата доставки: {{date('d.m.y', strtotime(date('d.m.y').'+2 day'))}}</small>
                            <strong id="order-sum" class="col-3">Итого:{{$sum}}₽</strong>
                        </div>
                    @else
                        В корзине пока пусто
                        @endforelse


                </div>
                <div class="modal-footer">
                    <div class="col">
                        @if (auth()->user())
                            <p>Заказ будет отправлен на
                                <strong>{{auth()->user()->email}}</strong></p>
                        @endif
                    </div>
                    <input class="form-check-input" type="checkbox" value="" id="order-confirm">
                    <label class="form-check-label" for="order-confirm">
                        Подтвердить заказ
                    </label>
                    <form method="post" action="{{route('orderSend')}}">
                        @csrf
                        <button id="btn-confirm-order" type="submit" class="btn btn-primary disabled" disabled>Отправить</button>
                    </form>
                    @if (session('success')=='Успешно удалено из корзины!' ||  session('success')=='Успешно изменено количество!')

                        <script>
                            $(function() {
                                $('#cart-btn').click();
                            });
                        </script>
                    @endif
                </div>
            </div>
        </div>
    </div>


