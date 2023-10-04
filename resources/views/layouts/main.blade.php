<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--    <link rel="stylesheet" href="{{ asset('build/assets/app-041e359a.css') }}">--}}
    <title>Document</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class=" collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto ">
                <li class="nav-item">
                    <a class="nav-link mx-2 active" aria-current="page" href="{{ url('main') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2" href="{{ url('posts') }}">Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2" href="{{ url('contact') }}">Contact</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link mx-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        More
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                        <li><a class="dropdown-item" href="{{ url('about') }}">About Us</a></li>

                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    @yield('content')
</div>
</body>
</html>
