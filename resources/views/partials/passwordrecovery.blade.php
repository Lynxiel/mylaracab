<!-- Modal -->
<div class="modal fade" id="recoverModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header p-5 pt-3 pb-4 border-bottom-0">
                <h2 class="modal-title fw-bold mb-0">Восстановить пароль</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5 pt-0">

                <form method="post" action="{{route('account.recover')}}">
                    @method('PUT')
                    @csrf
                    <div class="input-group my-3">
                        <input type="email"  name="email" required class="form-control" id="email" placeholder="Email" aria-describedby="btn-recovery"  >
                        <button type="submit" class="btn btn-success" type="button" id="btn-recovery">Отправить</button>
                    </div>
                    @error('email')
                    <div class="alert alert-danger mt-1 pt-1 pb-1 text-center">
                        {{$message}}
                    </div>
                    @enderror
                </form>
                @if (session('recoveryFailed'))
                    <script>
                        $(function() {
                            $('#btn-recover').click();

                        });
                    </script>
                    @if ($errors->has('user_not_found'))
                        <div class="text-center">
                            <button id="btn-register3" type="button" class="btn btn-warning modal-btn" data-bs-toggle="modal" data-bs-target="#regModal">Зарегистрироваться</button>
                        </div>
                    @endif
                @endif
                <p class="text-center  fs-6 mb-0 text-white">
                    На указанный email-адрес придёт новый пароль, который вы сможете изменить в личном кабинете.
                </p>
            </div>
        </div>
    </div>
</div>
