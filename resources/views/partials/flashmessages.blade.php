@if (session('OrderSend'))
    <div class="alert bg-orange alert-dismissible fade show text-white" role="alert">
        Заказ успешно отправлен!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session('UserRegistered'))
    <div class="alert bg-orange alert-dismissible fade show text-white" role="alert">
        Вы успешно зарегистрировались!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif



@if (session('OrderCanceled'))
    <div class="alert bg-orange alert-dismissible fade show text-white" role="alert">
        Заказ отменён!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('PasswordChanged'))
    <div class="alert bg-orange alert-dismissible fade show text-white" role="alert">
        Письмо с учетными данными было отправлено на {{session('emailrecover')??auth()->user()->email}}!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('AccountDeleted'))
    <div class="alert bg-orange alert-dismissible fade show text-white" role="alert">
        Учетные данные были удалены!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session('MsgSent'))
    <div class="alert bg-orange alert-dismissible fade show text-white" role="alert">
        Сообщение успешно отравлено!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


