<button id="btn-register" type="button" class="btn btn-outline-light modal-btn " data-bs-toggle="modal" data-bs-target="#regModal">Регистрация</button>
<!-- Modal registration -->
<div class="modal fade" id="regModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0">
                <h2 class="modal-title fw-bold mb-0 text-white ">РЕГИСТРАЦИЯ</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>

            <div class="modal-body p-5 pt-0 mt-4">

                <form method="post" action="{{route('register')}}" class="user_register">
                    @csrf
                    <div class="form-floating mb-3">
                        <x-controls.input name="email" label="Email" type="email" required="1"  />
                    </div>
                    <div class="form-floating mb-3">
                        <x-controls.input name="phone" label="Телефон" type="text" required="1" />

                    </div>
                    <div class="input-group form-floating show_hide_password mb-3" >
                        <x-controls.input name="password" label="Пароль" type="password" required="1" />
                    </div>
                    <div class="input-group form-floating show_hide_password mb-3" >
                        <x-controls.input  name="password_confirmation" label="Подтверждение пароля" type="password" required="1" >
                            <div class="input-group-text" id="basic-addon1">
                                <a href="###" class="eye-slash" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
                                        <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"></path>
                                        <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"></path>
                                        <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z"></path>
                                    </svg>
                                </a>
                            </div>
                        </x-controls.input>

                    </div>
                    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-orange text-uppercase" type="submit">Зарегистрироваться</button>
                    <small class="text-white-50">Нажимая "Зарегистрироваться", Вы даете согласие на <a href="{{route('agreement')}}" class="text-orange"> обработку персональных данных</a></small>

                    @if (session('registerFailed') )
                            <script>
                                $(function() {
                                    $('#btn-register').click();
                                    $('.btn-close').bind('click',function (){
                                        $('div.alert-danger').remove();
                                    })
                                });


                            </script>
                    @endif
                    <hr>
                    <small class="text-white text-center ">Уже зарегистрированы?</small>
                    <button type="button" id="btn-login" class="btn btn-orange modal-btn text-white text-uppercase" data-bs-toggle="modal" data-bs-target="#loginModal">Вход</button>

                </form>
            </div>
        </div>
    </div>
</div>

    <script>
        $('input[name=phone]').mask("+7(999)999-99-99");
    </script>
