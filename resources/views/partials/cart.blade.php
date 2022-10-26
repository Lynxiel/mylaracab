<button id="cart-btn" type="button" class="btn bg-orange text-white" data-bs-toggle="modal" data-bs-target="#CartModal" >

    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
    </svg>
    <span class="cart-count">{{(!empty($cart))?count($cart):''}}</span>
</button>

<div class="modal fade" id="CartModal" tabindex="-1" aria-labelledby="CartModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title text-white" id="exampleModalLabel">КОРЗИНА</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
                            <path d="M7.5 1v7h1V1h-1z"/>
                            <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
                        </svg>
                    </button>
                </div>
                <div class="modal-body" id="cart-container">
                    @if (!empty($cart))
                        @php $sum=0; @endphp
                        @foreach ($cart as $item)
                            @php
                                $quantity =session()->get('cable_id')?session()->get('cable_id')[$item->cable_id]:1;
                                $sum += $item->price*$quantity*$item->footage;

                            @endphp
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-4 ">
                                                    <h6 class="mb-0 text-white">{{$item->title}} </h6>
                                                    <p class="mb-0 opacity-75 text-orange">Доступно: {{$item->instock}}м</p>

                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-2 col-2 ">
                                                    <p class=" cable-summ mb-0 text-center badge bg-orange text-wrap text-black ">{{$item->price*$quantity*$item->footage}}₽</p>
                                                    <p class="opacity-50 mb-0 text-nowrap cable-price text-center text-white">{{$item->price}}₽/м</p>
                                                    <p class="opacity-50 mb-0 text-nowrap cable-price text-center text-white">{{$item->footage*$quantity}}м</p>

                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-4  text-center">
                                                    <form method="post" action="{{route('cart.update')}}">
                                                        @method("PUT")
                                                        @csrf
                                                        <input  required name="cable_id" readonly value="{{$item->cable_id}}" hidden>
                                                        <div class="qty pt-2 mt-2">
                                                            <span class="minus bg-dark">-</span>
                                                            <input type="number" readonly class="count quantity_edit" name="quantity" value="{{$quantity}}">
                                                            <span class="plus bg-dark">+</span>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                                    <form method="post" action="{{route('cart.remove')}}">
                                                        @csrf
                                                        <input  required name="cable_id" readonly value="{{$item->cable_id}}" hidden>
                                                        <button type="submit" class="btn btn-orange btn-remove-cart mt-2 text-white">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                            <hr>

                        @endforeach
                        @php $auth = auth()->user();
                             if ($auth) $col = 6; else $col = 12;
                        @endphp
                        <div class=" {{ $auth?'row':'' }} justify-content-center mb-2 mt-2">

                            <div class="col-lg-{{$col}} col-md-{{$col}} col-sm-{{$col}} col-{{$col}} badge bg-dark text-wrap text-center text-warning"><p class="fs-6 fw-bold d-inline-block mt-2 mb-0 text-white text-uppercase" >Итого:{{$sum}}₽</p> </div>
                            <div class="col-lg-{{$col}} col-md-{{$col}} col-sm-{{$col}} col-{{$col}}  ">
                                <form method="post" action="{{route('order.create')}}">
                                    @csrf
                                    @if ($auth)
                                        <div class="row">
                                            <div class="col-lg-12  col-md-12  col-sm-12 col-xs-12 section-confirm">
                                                <button id="btn-confirm-order" type="submit" class="btn btn-orange text-white text-uppercase"  >Отправить заказ</button>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row mt-3 unauthorized-order">
                                            <div class="col-6">
                                                <div class="form-floating mb-3 mt-1">
                                                    <input  name="order_contact"  type="text" required class="form-control rounded-3" id="order_contact" >
                                                    <label for="order_contact text-white text-uppercase">Телефон</label>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <button id="btn-confirm-order" type="submit" class="btn btn-orange mt-1 text-uppercase text-white" >Отправить заказ</button>

                                            </div>

                                        </div>
                                        <p class="unauthorized-desc mb-1 text-center text-white">После отправки с Вами свяжется наш менеджер для уточнения деталей заказа<br></p>

                                        <script>
                                            $("#order_contact").mask("+7(999)999-99-99");
                                        </script>
                                    @endif


                                </form>

                            </div>
                            <p class="text-center text-white">Ожидаемая дата доставки: {{date('d.m.y', strtotime(date('d.m.y').'+2 day'))}}</p>

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

                        <p class="text-white">Пока ничего нет</p>
                    @endforelse


                </div>

            </div>
        </div>
    </div>
