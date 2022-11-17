@include('mails.header')
<table>
    <tr>
        <td bgcolor="#ffffff" align="left"
            style="Margin:0;padding-top:20px;padding-bottom:20px;padding-left:30px;padding-right:30px">
            <p style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:18px;color:#666666;font-size:14px">
                По заказу №{{$order->id}} от {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $order->created_at)->format('d.m.y')}} поступила оплата.
            </p>
        </td>
    </tr>
</table>

@include('mails.footer')

