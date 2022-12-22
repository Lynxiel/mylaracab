<x-layouts.header title="Личный кабинет"  />
<body>
    <x-layouts.nav :cart="$cart" />

<div class=" bg-light">
    <div class="container" id="account">
        @include('partials.flashmessages')
        <h2 class="text-start text-uppercase pt-4">История заказов</h2>

            @php   $i=1; @endphp
            @if (!$orders->isEmpty())
                <div class="d-flex justify-content-end mb-4">
                    {{ $orders->links() }}
                </div>
                <div class="accordion" >
                    @foreach($orders as $order)
                    <x-controls.accordion  collapsed="{{$i==1?false:true}}" >
                        <x-slot:header>
                            <h6 class="group-title text-dark">№{{$order->id}} от {{$order->created_at->format('d.m.y')}} -
                                {{$order->getStatusTitle($order->status)}}
                        </x-slot:header>

                        <x-forms.order :order="$order" />
                    </x-controls.accordion>

                    @php $i++; @endphp
                    @endforeach
                </div>
                <div class="d-flex justify-content-end">
                    {{ $orders->links() }}
                </div>

            @else
                <p>Заказов пока нет</p>
                <button class="btn btn-orange"><a href="{{route('index')}}" class="text-white">Вернуться на главную</a></button>
            @endif

            <h4 class="mt-5 text-uppercase">Личные данные</h4>
            <x-controls.modal id="password_update" classes="btn btn-orange" label="Сменить пароль">
                <h3>Сменить пароль</h3>
                <form action="{{route('password.update')}}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="form-floating mb-3 show_hide_password">
                        <x-controls.input  name="password" label="Текущий пароль" type="password" required="1" />
                    </div>
                    <div class="form-floating mb-3 show_hide_password">
                        <x-controls.input  name="new_password" label="Новый пароль" type="password" required="1" />
                    </div>
                    <div class="input-group form-floating show_hide_password mb-3" >
                        <x-controls.input  name="new_password_confirmation" label="Подтверждение нового пароля" type="password" required="1" >
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
                    <button class="btn btn-orange" type="submit">Отправить</button>
                    @if (session('updateFailed'))
                        <script>
                            $('#password_update').prev('button').click();
                        </script>
                    @endif
                </form>


            </x-controls.modal>
            <form method="post" action="{{route('account.save')}}" class="mt-4">
                @csrf
                <div class="row">

                    <div class="form-floating mb-3 col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <input type="text" name="name" required class="form-control rounded-3" id="name" value="{{old('name')??$user->name }}">
                        <label class="px-4" for="floatingInput">Имя контактного лица</label>
                    </div>
                    <div class="form-floating mb-3  col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <input type="text" name="phone"  required class="form-control rounded-3" disabled id="phone" value="{{old('phone')??$user->phone }}">
                        <label class="px-4" for="floatingInput">Телефон</label>
                    </div>
                    <div class="form-floating mb-3 col-lg-4 col-md-4 col-sm-12">
                        <input type="email" name="email" required class="form-control rounded-3" id="email" value="{{old('email')??$user->email }}" readonly>
                        <label class="px-4" for="floatingInput">Email</label>
                    </div>
                </div>
                @if (!isset($user->company_name))
                <div class=" alert alert-success">
                    <h6>Для формирования счета с корректными реквизитами плательщика заполните поля ниже:</h6>
                </div>
                @endif
                <div class="row">
                    <div class="form-floating mb-3 col-8">
                        <input type="text" name="company_name"  class="form-control rounded-3" id="company_name" value="{{old('company_name')??$user->company_name}}">
                        <label class="px-4" for="floatingInput">Название компании </label>
                    </div>
                    <div class="form-floating mb-3 col-4">
                        <input type="number" name="postcode"  class="form-control rounded-3" id="postcode" value="{{old('postcode')??$user->postcode}}">
                        <label class="px-4" for="floatingInput">Индекс </label>
                    </div>
                </div>

                <div class="row">

                    <div class="form-floating mb-3 col-12">
                        <textarea  name="address"  class="form-control rounded-3" id="address" >{{old('address')??$user->address}}</textarea>
                        <label class="px-4" for="floatingInput">Юридический адрес </label>
                    </div>

                </div>

                @if ($errors->any() && !$errors->has('action')  )
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible mt-1" role="alert">
                            <div>{{ $error }}</div>
                        </div>
                    @endforeach
                @endif

                <div class="col-12 col-md-4">
                    <input type="submit" class="btn btn-success" value="Сохранить изменения">
                </div>

            </form>



            <!-- Button trigger modal -->
            <button type="button" class="btn btn-secondary mt-4 mb-4 text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Удалить аккаунт
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body mt-3">
                            <h4 class="text-white">Действительно удалить аккаунт?</h4>
                            <p class="text-white">Это действие нельзя будет обратить</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Нет</button>
                            <form action="{{route('account.delete')}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Да</button></a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


    </form>
    </div>
</div>
    <x-layouts.footer />
</body>







