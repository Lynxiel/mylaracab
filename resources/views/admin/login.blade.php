<x-layouts.header />

<body class="text-center">
<div class="container w-25">
    <main class="form-signin w-100 m-auto">
        <form method="post" action="{{route('auth')}}">
            @csrf
            <img class="mb-4" src="{{asset('images/logo2.svg')}}" alt="" width="300" height="150">
            <h1 class="h3 mb-3 fw-normal text-white">Административная панель</h1>

            <div class="form-floating">
                <x-controls.input label="Email" type="email" name="email" class="form-control"  placeholder="name@example.com" />
            </div>
            <div class="form-floating">
                <x-controls.input name="password" label="Пароль" type="password" class="form-control"  placeholder="Password" />
            </div>
            <button class="w-100 btn btn-lg btn-orange" type="submit">Вход</button>
        </form>
    </main>
</div>






</body>
