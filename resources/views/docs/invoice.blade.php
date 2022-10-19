<html>
<head>
    <style>body { font-family: DejaVu Sans }</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style type="text/css">
        * {font-size: 14px;line-height: 14px;}
        table {margin: 0 0 15px 0;width: 100%;border-collapse: collapse;border-spacing: 0;}
        table th {padding: 5px;font-weight: bold;}
        table td {padding: 5px;}
        .header {margin: 0 0 0 0;padding: 0 0 15px 0;font-size: 12px;line-height: 12px;text-align: center;}
        h1 {margin: 0 0 10px 0;padding: 10px 0;border-bottom: 2px solid #000;font-weight: bold;font-size: 20px;}

        /* Реквизиты банка */
        .details td {padding: 3px 2px;border: 1px solid #000000;font-size: 12px;line-height: 12px;vertical-align: top;}

        /* Поставщик/Покупатель */
        .contract th {padding: 3px 0;vertical-align: top;text-align: left;font-size: 13px;line-height: 15px;}
        .contract td {padding: 3px 0;}

        /* Наименование товара, работ, услуг */
        .list thead, .list tbody  {border: 2px solid #000;}
        .list thead th {padding: 4px 0;border: 1px solid #000;vertical-align: middle;text-align: center;}
        .list tbody td {padding: 0 2px;border: 1px solid #000;vertical-align: middle;font-size: 11px;line-height: 13px;}
        .list tfoot th {padding: 3px 2px;border: none;text-align: right;}

        /* Сумма */
        .total {margin: 0 0 20px 0;padding: 0 0 10px 0;border-bottom: 2px solid #000;}
        .total p {margin: 0;padding: 0;}

        /* Руководитель, бухгалтер */
        .sign {position: relative;}
        .sign table {width: 60%;}
        .sign th {padding: 40px 0 0 0;text-align: left;}
        .sign td {padding: 40px 0 0 0;border-bottom: 1px solid #000;text-align: right;font-size: 12px;}
        .sign-1 {position: absolute;left: 149px;top: -44px;}
        .sign-2 {position: absolute;left: 149px;top: 0;}
        .printing {position: absolute;left: 271px;top: -15px;}
    </style>
</head>
<body>
<p class="header">
    Внимание! Оплата данного счета означает согласие с условиями поставки товара.
    Уведомление об оплате обязательно, в противном случае не гарантируется наличие
    товара на складе. Товар отпускается по факту прихода денег на р/с Поставщика,
    самовывозом, при наличии доверенности и паспорта.
</p>

<table class="details">
    <tbody>
    <tr>
        <td colspan="2" style="border-bottom: none;">Филиал "Центральный" Банка ВТБ ПАО г.Москва</td>
        <td>БИК</td>
        <td style="border-bottom: none;">044525411</td>
    </tr>
    <tr>
        <td colspan="2" style="border-top: none; font-size: 10px;">Банк получателя</td>
        <td>Сч. №</td>
        <td style="border-top: none;">30101810145250000411</td>
    </tr>
    <tr>
        <td width="25%">ИНН 711600236125</td>
        <td width="30%">КПП 0</td>
        <td width="10%" rowspan="3">Сч. №</td>
        <td width="35%" rowspan="3">40802810310450004255</td>
    </tr>
    <tr>
        <td colspan="2" style="border-bottom: none;">ИП Кондратьев Александр Семенович</td>
    </tr>
    <tr>
        <td colspan="2" style="border-top: none; font-size: 10px;">Получатель</td>
    </tr>
    </tbody>
</table>
<h1>Счет на оплату № {{$order->order_id}} от {{$order->created_at->format('d.m.y')}} </h1>

<table class="contract">
    <tbody>
    <tr>
        <td width="15%">Поставщик:</td>
        <th width="85%">ИП Кондратьев Александр Семенович, ИНН 711600236125, КПП 0, 301650, Новомосковск г, Вавилова, дом № 1А</th>
    </tr>
    <tr>
        <td>Покупатель:</td>
        <th>
            {{$user->company_name}}    {{$user->postcode}}  {{$user->address}}
        </th>
    </tr>
    </tbody>
</table>

<table class="list">
    <thead>
    <tr>
        <th width="5%">№</th>
        <th width="54%">Наименование товара, работ, услуг</th>
        <th width="8%">Коли-<br>чество</th>
        <th width="5%">Ед.<br>изм.</th>
        <th width="14%">Цена</th>
        <th width="14%">Сумма</th>
    </tr>
    </thead>
    <tbody>';

    @php $total = $nds = 0; $i=0;@endphp
    @foreach ($order->cables as $key => $cable)
    @php
    $total += $cable->price * $cable->quantity;
    @endphp


    <tr>
        <td align="center">{{++$i}}</td>
        <td align="left">{{$cable->cable->title}}</td>
        <td align="right">{{$cable->quantity}}</td>
        <td align="left">м</td>
        <td align="right">{{sprintf("%.2f", $cable->price)}}</td>
        <td align="right">{{sprintf("%.2f",$cable->price * $cable->quantity)}}</td>
    </tr>';
    @endforeach

    </tbody>
    <tfoot>
    <tr>
        <th colspan="5">Итого:</th>
        <th>{{sprintf("%.2f",$total)}}</th>
    </tr>
    <tr>
        <th colspan="5">Без НДС</th>
    </tr>
    <tr>
        <th colspan="5">Всего к оплате:</th>
        <th>{{sprintf("%.2f",$total)}}</th>
    </tr>
    </tfoot>
</table>

<div class="total">
    <p>Всего наименований {{count($order->cables)}}, на сумму {{sprintf("%.2f",$total)}}</p>
</div>

<div class="sign">
    <img width="250px" class="sign-1" src="{{asset('images/signature.png')}}">
    <table>
        <tbody>
        <tr>
            <th width="30%">Индивидуальный предприниматель</th>
            <td width="70%">Кондратьев А.С.</td>
        </tr>

        </tbody>
    </table>
</div>
</body>
</html>
