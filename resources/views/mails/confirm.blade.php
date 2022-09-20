<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Заказ Kabelopt71.ru</title>
    <link rel="stylesheet" href="/vendor/twbs/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="/resources/css/style.css">
</head>
<body class="antialiased">
Спасибо за заказ!
В ближайшее время с Вами свяжется наш менеджер для подтверждения заказа. После этого станет доступна оплата и формирование счета.
@if (!empty($cart))
    <?php $sum=0; $n=1;?>
    @foreach ($cart as $item)

        <?php $sum += $item->price*(session()->get('cable_id')?session()->get('cable_id')[$item->cable_id]:100); ?>
        <div class="list-group w-auto">
            <div class="row ">
                <div class="col-md-12">
                    <div  class="list-group-item list-group-item-action d-flex " aria-current="true">
                        <div class="d-flex gap-2 w-100 justify-content-between">
                            <small class="mb-0">{{$n}}. {{$item->title}} </small>
                            <small class="opacity-50 text-nowrap cable-price">{{$item->price}}₽ х</small>
                            <small class="opacity-50 text-nowrap cable-quantity">{{session()->get('cable_id')?session()->get('cable_id')[$item->cable_id]:100}}м</small>
                            <small class=" cable-summ text-muted text-center">{{$item->price*(session()->get('cable_id')?session()->get('cable_id')[$item->cable_id]:100)}}₽</small>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <?php $n++;?>
    @endforeach
    <div class="mt-1">
        <div class="col-3">Ожидаемая дата доставки: {{date('d.m.y', strtotime(date('d.m.y').'+2 day'))}}</div>
        <strong id="order-sum" class="col-3">Итого:{{$sum}}₽</strong>
    </div>
@endif

</body>
@include('mails.footer')

</html>
