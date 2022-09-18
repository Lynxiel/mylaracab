
            <div class="container admin_account" id="account">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-floating">
                            <input type="date" name="date_begin"  class="form-control rounded-3" id="date_begin" value="{{date("Y-m-d")}}">
                            <label class="px-4" for="date">Дата с</label>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-floating">
                            <input type="date" name="date_end"  class="form-control rounded-3" id="date_end" value="{{date("Y-m-d")}}">
                            <label class="px-4" for="date">Дата по</label>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label class="px-4" for="status_filter">Статус</label>
                        <select class="form-select" id="status_filter" aria-label="Default select example">
                            <option selected>Выбрать статус</option>
                            <option value="0">Создан</option>
                            <option value="1">Подтвержден</option>
                            <option value="2">Оплачен</option>
                            <option value="3">Завершен</option>
                        </select>
                    </div>
                </div>
                <div class="list-group w-auto">
                    @php  $summ = 0;   @endphp
                    @if (!empty($orders))
                        @foreach($orders as $order)
                                @php  $summ = 0;  $orderdata = $order[0]; @endphp

                                @include('admin.order')
                        @endforeach

                    @else
                        <p>Заказов пока нет</p>
                    @endif


                    @if ($errors->any() && !$errors->has('action')  )
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible mt-1" role="alert">
                                <div>{{ $error }}</div>
                            </div>
                    @endforeach
                @endif

                </div>
                <script type="text/javascript">

                        $(".ajax-savechanges").on('click',function (e) {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            e.preventDefault();
                            var input = $(this);
                            var formData = {
                                order_id: input.closest('form').find('input[name="order_id"]').val(),
                                address: input.closest('form').find('#address').val(),
                                comment:input.closest('form').find('#comment').val(),
                                pay_link:input.closest('form').find('#pay_link').val(),
                                status: input.closest('form').find('#status').is(':checked')?$(this).closest('form').find('#status').val():$(this).closest('form').find('#status').val()-1,
                            };
                            var type = "POST";
                            var ajaxurl = 'update_order';
                            $.ajax({
                                type: type,
                                url: ajaxurl,
                                data: formData,
                                success: function (data) {
                                    input.val('Сохранено!');
                                },
                                error: function (data) {
                                    input.val('Возникла ошибка');
                                    console.log(data.responseText);
                                }
                            });
                        });

                </script>
            </div>



