@if (session('success')=='OrderSend')
    <div class="alert alert-success" role="alert">
        Заказ успешно отправлен!
    </div>
@endif


@if (session('success')=='OrderCanceled')
    <div class="alert alert-success" role="alert">
        Заказ удалён!
    </div>
@endif


@if (session('success')=='Verification link sent')
    <div class="alert alert-success" role="alert">
        Ссылка на подтверждение Email-адреса отправлена на почту
    </div>
@endif

