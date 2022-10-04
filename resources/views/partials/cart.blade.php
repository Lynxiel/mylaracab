<button id="cart-btn" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#CartModal" >

    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
    </svg>
    <span class="cart-count">{{(!empty($cart))?count($cart):''}}</span>
</button>

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
                                                        <input type="number" step="100" min="0" id="quantity"  class="form-control-sm quantity_edit" required name="quantity"  value="{{ session()->get('cable_id')?session()->get('cable_id')[$item->cable_id]:100}}">
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
                                    @csrf
                                        @if (auth()->user())
                                            <div class="row">

                                                <div class="col-6 section-confirm">
                                                    <button id="btn-confirm-order" type="submit" class="btn btn-primary "  >Отправить заказ</button>
                                                </div>
                                            </div>
                                        @else
                                            <div class="row mt-1 unauthorized-order">
                                                <div class="col-6">
                                                    <div class="form-floating mb-3 mt-1">
                                                        <input  name="order_contact"  type="text" required class="form-control rounded-3" id="order_contact" >
                                                        <label for="order_contact">Телефон</label>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <button id="btn-confirm-order" type="submit" class="btn btn-primary mt-1" >Отправить заказ</button>

                                                </div>

                                            </div>
                                    <hr>
                                                <p class="unauthorized-desc">После отправки с Вами свяжется наш менеджер для уточнения деталей заказа. Для сохранения истории заказов и отслеживания статуса<br></p>
                                                <div class="row justify-content-center">
                                                    <div class="offset-1 col-4">
                                                        <button id="btn-register" type="button" class="btn btn-warning mt-1" data-bs-toggle="modal" data-bs-target="#regModal">Зарегистрируйтесь</button>
                                                    </div>
                                                    <div class="offset-1 col-1 mt-2 cart-or"><p>или</p></div>
                                                    <div class="col-5">
                                                        <button type="button" id="btn-login" class="btn btn-warning mt-1" data-bs-toggle="modal" data-bs-target="#loginModal">Войдите</button>
                                                    </div>
                                                </div>
                                                   <script>
                                                    $("#order_contact").mask("+7(999)999-99-99");
                                                </script>
                                    @endif


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
