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
                                        <div  class="list-group-item list-group-item-action  " aria-current="true">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-3 ">
                                                    <h6 class="mb-0">{{$item->title}} </h6>
                                                    <p class="mb-0 opacity-75 text-success">Доступно: {{$item->instock}}м</p>
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                                    <p class="opacity-50 text-nowrap cable-price text-center">{{$item->price}}₽</p>
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                                    <form method="post" action="{{route('updateQuantity')}}">
                                                        @csrf
                                                        <input  required name="cable_id" readonly value="{{$item->cable_id}}" hidden>
                                                        <input type="number" step="100" min="0" id="quantity" onchange="this.closest('form').submit()" class="form-control-sm" required name="quantity"  value="{{ session()->get('cable_id')?session()->get('cable_id')[$item->cable_id]:100}}">
                                                    </form>
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-2 col-3">
                                                    <p class=" cable-summ text-muted pt-2 text-center">{{$item->price*(session()->get('cable_id')?session()->get('cable_id')[$item->cable_id]:100)}}₽</p>
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                                    <form method="post" action="{{route('removeFromCart')}}">
                                                        @csrf
                                                        <input  required name="cable_id" readonly value="{{$item->cable_id}}" hidden>
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

                            <div class="modal-footer">
                                <form method="post" action="{{route('createOrder')}}">

                                        @if (auth()->user())
                                            <div class="row">
                                                <div class="col-6 mt-1">
                                                    <p>Заказ будет отправлен на
                                                        <strong>{{auth()->user()->email}}</strong></p>
                                                </div>
                                                <div class="col-6 section-confirm">
                                                    <input class="form-check-input" type="checkbox" value="" id="order-confirm">
                                                    <label class="form-check-label" for="order-confirm">
                                                        Подтвердить заказ
                                                    </label>
                                                    <button id="btn-confirm-order" type="submit" class="btn btn-primary disabled" disabled >Отправить</button>
                                                </div>
                                            </div>
                                        @else
                                            <div class="row mt-1 unauthorized-order">
                                                <div class="col-6">
                                                    <div class="form-floating mb-3 mt-1">
                                                        <input  name="order_contact"  type="email" required class="form-control rounded-3" id="order-contact" placeholder="name@example.com">
                                                        <label for="email">Email</label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <button id="btn-confirm-order" type="submit" class="btn btn-primary mt-1" >Отправить</button>

                                                </div>

                                            </div>
                                        @endif

                                    @csrf
                                </form>
                            </div>
                                @if (session('success')=='Успешно удалено из корзины!' ||  session('success')=='Успешно изменено количество!')

                                    <script>
                                        $(function() {
                                            $('#cart-btn').click();
                                        });
                                    </script>
                                @endif
                            </div>
                    @else
                        В корзине пока пусто
                        <div class="modal-footer"></div>
                        @endforelse


                </div>

            </div>
        </div>
    </div>
