<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Meta tags -->
        <title>{{ config('app.name', 'Larapplication') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- CSS -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

        <!-- Javascript -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://kit.fontawesome.com/854945452c.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    </head>
    <body>

        <div id="page-container">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg shadow-sm">
                <div class="container">
                    <div class="d-flex">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{ asset('images/starnode.png') }}" alt="logo" class="nav-logo d-inline-block mx-1"/>
                            StarNode
                        </a>
                        <button class="justify-content-end navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>

                    <div class="collapse justify-content-end navbar-collapse" id="navbarContent">
                        <ul class="navbar-nav mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/jobs') }}">Vacatures</a>
                            </li>
                            @if (\Illuminate\Support\Facades\Auth::check() == false)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Mijn account
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @if (\Illuminate\Support\Facades\Auth::user()->role > 1)
                                            <li>
                                                <a class="dropdown-item" href="{{ url('/admin') }}">Admin</a>
                                            </li>
                                        @endif
                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Uitloggen</a>
                                        </li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                                            @csrf
                                        </form>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>

            <div id="main">
                @yield('content')
            </div>

            <div class="footer p-3 bg-white shadow-lg">
                <div class="container">
                    <div class="row row align-items-center">
                        <div class="col-md-6">
                            <a href="https://discord.starnode.nl" target="_blank">
                                <img src="https://discord.com/assets/f8389ca1a741a115313bede9ac02e2c0.svg" alt="Discord logo" style="width: 5%">
                            </a>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-12">
                                    <p><span class="mx-2 fw-bold">KVK: </span> {{ env('KVK') }} <span class="mx-2 fw-bold">BTW: </span> {{ env('BTW') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <span class="fw-bold">&#169; StarNode</span>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
