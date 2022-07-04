<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $_ENV['APP_NAME'] }}</title>
    <link rel="stylesheet" href="/vendor/twbs/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="/vendor/twbs/bootstrap/dist/js/bootstrap.js">
    <link rel="stylesheet" href="/resources/css/style.css">


</head>
<body class="antialiased">
<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
                <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
                <li><a href="#" class="nav-link px-2 text-white">About</a></li>
            </ul>

            <div class="text-end">
                <button type="button" class="btn btn-outline-light me-2">Login</button>
                <button type="button" class="btn btn-warning">Sign-up</button>
            </div>
        </div>
    </div>
</header>


<div class="px-4 py-5 my-5 text-center container">
    <h1 class="display-5 fw-bold">Centered hero</h1>
    <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        @foreach($cables as $cable)
            <div class="col-lg-4 col-sm-6 col-xs-6 col-md-4">
                <div class="card">
                    <div class="card-header">{{$cable['title']}}</div>
                </div>
            </div>
        @endforeach
    </div>
</div>


</body>
</html>
