<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Gestión de Denuncias') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
    <!-- BOOTSTRAP -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
  
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('img/logo_standar.svg') }}" alt="Logo Contraloría">
                    </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <!-- Puedes agregar más elementos aquí si es necesario -->
                    </ul>
                
                    @auth
                    <ul class="navbar-nav mx-auto">
                       {{--  <li class="nav-item">
                            <a class="nav-link" href="{{ url('chat/mostrar') }}">{{ __('Chat') }}</a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('denuncias/mostrar') }}">{{ __('Denuncias') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('denuncias/mostrarcasos') }}">{{ __('Subir Casos') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/denuncias/registro') }}">{{ __('Registrar Denuncia') }}</a>
                        </li>
                       
                    </ul>
                @endauth
            
                
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                                </li>
                            @endif
                
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                </li>
                            @endif
                        @else
                        
                            <!-- Menú desplegable de usuario -->
                            <li class="nav-item dropdown d-flex align-items-center">
                                <!-- Nombre del usuario -->
                                <a class="nav-link " href="#" id="navbarDropdown" >
                                    {{ Auth::user()->name }}
                                </a>
                            
                                <!-- Enlace de Cerrar Sesión -->
                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar Sesión') }}
                                </a>
                            
                                <!-- Formulario de Logout -->
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
                
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
