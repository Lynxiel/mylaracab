@include('mails.header')

<table class="es-content" cellspacing="0" cellpadding="0" align="center"
       style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
    <tbody>
    <tr style="border-collapse:collapse">
        <td align="center" style="padding:0;Margin:0">
            <table class="es-content-body"
                   style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px"
                   cellspacing="0" cellpadding="0" align="center">
                <tbody>
                <tr style="border-collapse:collapse">
                    <td align="left" style="padding:0;Margin:0">
                        <table width="100%" cellspacing="0" cellpadding="0"
                               style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                            <tbody>
                            <tr style="border-collapse:collapse">
                                <td valign="top" align="center" style="padding:0;Margin:0;width:600px">
                                    <table
                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-radius:4px;background-color:#ffffff"
                                        width="100%" cellspacing="0" cellpadding="0" bgcolor="#ffffff"
                                        role="presentation">
                                        <tbody>
                                        <tr style="border-collapse:collapse">
                                            <td class="es-m-txt-l" bgcolor="#ffffff" align="left"
                                                style="Margin:0;padding-top:20px;padding-bottom:20px;padding-left:30px;padding-right:30px">
                                                <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:18px;color:#666666;font-size:14px">
                                                    <strong>Ваш заказ №{{$order->id}} от {{$order->created_at->format('d-m-y')}} был подтвержден!</strong><br>
                                                    <br>
                                                    Теперь Вам доступна оплата заказа в личном кабинете по Qr-коду или с помощью счета.</p>
                                                @if ($order->comment)
                                                    <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:18px;color:#666666;font-size:14px">
                                                        <strong>Комментарий к заказу:</strong> {{$order->comment}}</p>
                                                @endif
                                                @if ($order->address)
                                                    <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:18px;color:#666666;font-size:14px">
                                                        <strong>Адрес доставки:</strong> {{$order->address}}</p>
                                                @endif

                                                @if ($order->pay_link)
                                                    <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:18px;color:#666666;font-size:14px">
                                                        <strong>Ссылка для оплаты:</strong> <a href="{{$order->pay_link}}">{{$order->pay_link}}</a></p>
                                                @endif
                                            </td>
                                        </tr>

                                        Состав заказа:
                                        @php $sum=0; $n=1; @endphp
                                        @foreach ($order->cables as $item)

                                            @php $sum += $item->pivot->quantity*$item->pivot->price*$item->pivot->footage @endphp
                                            <div class="list-group w-auto">
                                                <div class="row ">
                                                    <div class="col-md-12">
                                                        <div  class="list-group-item list-group-item-action d-flex " aria-current="true">
                                                            <div class="d-flex gap-2 w-100 justify-content-between">
                                                                <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:27px;color:#666666;font-size:12px">
                                                                    {{$n++}}. {{$item->title}}
                                                                    {{$item->pivot->price}}₽ х  {{$item->pivot->footage*$item->pivot->quantity}}м
                                                                    {{$item->pivot->price*$item->pivot->footage*$item->pivot->quantity}}₽
                                                                </p>
                                                                <hr>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        @endforeach
                                        Сумма: {{$sum}}₽
                                        @if ($order->delivery_cost===null)
                                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:18px;color:#666666;font-size:14px">
                                                Доставка: {{$order->delivery_cost}}₽
                                                <strong>Итого:</strong> {{$order->delivery_cost+$sum}}₽
                                           </p>
                                        @endif



                                        <tr style="border-collapse:collapse">
                                            <td class="es-m-txt-l" align="left"
                                                style="padding:0;Margin:0;padding-top:20px;padding-left:30px;padding-right:30px">
                                                <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:18px;color:#666666;font-size:12px">
                                                    Если у вас есть вопросы, то просто ответьте на это письмо. Мы всегда рады помочь!</p></td>
                                        </tr>
                                        <tr style="border-collapse:collapse">
                                            <td class="es-m-txt-l" align="left"
                                                style="Margin:0;padding-top:20px;padding-left:30px;padding-right:30px;padding-bottom:40px">
                                                <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:18px;color:#666666;font-size:12px">
                                                    С уважением, </p>
                                                <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:18px;color:#666666;font-size:12px">
                                                    КабельОпт71</p></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
<table class="es-content" cellspacing="0" cellpadding="0" align="center"
       style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
    <tbody>
    <tr style="border-collapse:collapse">
        <td align="center" style="padding:0;Margin:0">
            <table class="es-content-body"
                   style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px"
                   cellspacing="0" cellpadding="0" align="center">
                <tbody>
                <tr style="border-collapse:collapse">
                    <td align="left" style="padding:0;Margin:0">
                        <table width="100%" cellspacing="0" cellpadding="0"
                               style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                            <tbody>
                            <tr style="border-collapse:collapse">
                                <td valign="top" align="center" style="padding:0;Margin:0;width:600px">
                                    <table width="100%" cellspacing="0" cellpadding="0" role="presentation"
                                           style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                        <tbody>
                                        <tr style="border-collapse:collapse">
                                            <td align="center"
                                                style="Margin:0;padding-top:10px;padding-bottom:20px;padding-left:20px;padding-right:20px;font-size:0">
                                                <table width="100%" height="100%" cellspacing="0"
                                                       cellpadding="0" border="0" role="presentation"
                                                       style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                    <tbody>
                                                    <tr style="border-collapse:collapse">
                                                        <td style="padding:0;Margin:0;border-bottom:1px solid #f4f4f4;background:#FFFFFF none repeat scroll 0% 0%;height:1px;width:100%;margin:0px"></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
<table class="es-content" cellspacing="0" cellpadding="0" align="center"
       style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
    <tbody>
    <tr style="border-collapse:collapse">
        <td align="center" style="padding:0;Margin:0">
            <table class="es-content-body"
                   style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px"
                   cellspacing="0" cellpadding="0" align="center">
                <tbody>
                <tr style="border-collapse:collapse">
                    <td align="left" style="padding:0;Margin:0">
                        <table width="100%" cellspacing="0" cellpadding="0"
                               style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                            <tbody>
                            <tr style="border-collapse:collapse">
                                <td valign="top" align="center" style="padding:0;Margin:0;width:600px">
                                    <table
                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;background-color:#ffecd1;border-radius:4px"
                                        width="100%" cellspacing="0" cellpadding="0" bgcolor="#ffecd1"
                                        role="presentation">
                                        <tbody>
                                        <tr style="border-collapse:collapse">
                                            <td align="center"
                                                style="padding:0;Margin:0;padding-top:30px;padding-left:30px;padding-right:30px">
                                                <h3 style="Margin:0;line-height:24px;mso-line-height-rule:exactly;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;font-size:20px;font-style:normal;font-weight:normal;color:#111111">
                                                    Нужна помощь?</h3></td>
                                        </tr>
                                        <tr style="border-collapse:collapse">
                                            <td esdev-links-color="#ffa73b" align="center"
                                                style="padding:0;Margin:0;padding-bottom:30px;padding-left:30px;padding-right:30px">
                                                <a target="_blank" href="###"
                                                   style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#ffa73b;font-size:18px">Напишите нам</a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
@include('mails.footer')
