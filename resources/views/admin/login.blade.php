<x-layouts.header />

<body class="text-center">

<main class="form-signin w-100 m-auto">
    <form>
        <img class="mb-4" src="{{asset('images/logo2.svg')}}" alt="" width="300" height="150">
        <h1 class="h3 mb-3 fw-normal text-white">Административная панель</h1>

        <div class="form-floating">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Пароль</label>
        </div>
        <button class="w-100 btn btn-lg btn-orange" type="submit">Вход</button>
    </form>
</main>





</body>
