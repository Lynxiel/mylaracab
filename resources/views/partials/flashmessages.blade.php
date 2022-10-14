@if (session('success')=='OrderSend')
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Заказ успешно отправлен!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session('success')=='UserRegistered')
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Вы успешно зарегистрировались!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif



@if (session('success')=='OrderCanceled')
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Заказ отменён!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('success')=='PasswordChanged')
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Письмо с учетными данными было отправлено на {{session('emailrecover')}}!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('AccountDeleted'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Учетные данные были удалены!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


