<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Pesquisas')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/chart.min.js') }}" defer></script>

    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <i class=" fas fa-hospital"></i>
                    Pesquisas
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else
                        <li class="nav-item">
                            <a href="{{route('dashboard')}}" class="nav-link"><i class="fas fa-chart-bar"></i> Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('search.create')}}" class="nav-link"><i class="fas fa-search"></i> Filtro Avanzado</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarAddData" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Datos
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mt-3" aria-labelledby="navbarAddData">
                                <a class="dropdown-item" href="{{ route('area.index') }}"><i class="fas fa-hospital-wide"></i> Areas</a>
                                <a class="dropdown-item" href="{{ route('consultorio.index') }}"><i class="fas fa-house-medical"></i> Consultorios</a>
                                <a class="dropdown-item" href="{{ route('pesquisado.index') }}"><i class="fas fa-hospital-user"></i> Pesquisados</a>
                                <a class="dropdown-item" href="{{ route('pesquisa.index') }}"><i class="fas fa-file-medical"></i> Pesquisas</a>
                            </div>
                        </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right mt-3" aria-labelledby="navbarDropdown">
                                    @if (Auth::user()->type=='administrador')
                                    <a class="dropdown-item" href="{{ route('register') }}"><i class="fas fa-user-plus"></i> Registrar usuario</a>
                                    <a class="dropdown-item" href="{{ route('user.index') }}"><i class="fas fa-users-gear"></i> Editar usuarios</a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-power-off"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @include('layouts.flash')
            @yield('content')
        </main>
    </div>
</body>
</html>
