<x-layouts.header title="Личный кабинет"  />
<body>
    <x-layouts.nav :cart="$cart" />

<div class="content-container bg-light">
    <div class="container" id="account">
        @include('partials.flashmessages')
        <h2 class="mt-4 text-start text-uppercase mt-5 pt-4">История заказов</h2>
        <div class="d-flex justify-content-end mb-4">
            {{ $orders->links() }}
        </div>

            <div class="accordion" >

            @php  $summ = 0; $i=1; @endphp

            @if (!empty($orders))
                @foreach($orders as $order)

                        @php  $summ = 0;  @endphp
            <x-controls.accordion  collapsed="{{$i==1?false:true}}" >
                <x-slot:header>
                    <h6 class="group-title text-dark">№{{$order->order_id}} от {{$order->created_at->format('d.m.y')}} -
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
            @endif

            <h4 class="mt-5 text-uppercase">Личные данные</h4>
            <form method="post" action="{{route('account.save')}}" class="mt-4">
                @csrf
                <div class="row">

                    <div class="form-floating mb-3 col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <input type="text" name="contact_name" required class="form-control rounded-3" id="name" value="{{old('contact_name')??$user->contact_name }}">
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

                <div class="col-12">
                    <input type="submit" class="btn btn-success" value="Сохранить изменения">
                </div>

            </form>

            @if ($errors->any() && !$errors->has('action')  )
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible mt-1" role="alert">
                        <div>{{ $error }}</div>
                    </div>
                @endforeach
            @endif


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






