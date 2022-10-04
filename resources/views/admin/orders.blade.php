
            <div class="container admin_account" id="account">

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



