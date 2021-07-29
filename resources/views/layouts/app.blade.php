<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<style>
    img {
        width:200px;
        height: auto;
    }

    footer {
        background-color: #100a2b;
        color: white;
        padding: 10px;
    }
</style>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="http://neonknightsrpg.com/assets/images/logo-neon-knights-header.png">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a style="color:#00ffff; font-weight: bold; letter-spacing: 1px;" class="nav-link" href="/handbook">{{ __('Game Handbook') }}</a>
                        </li>
                        <li class="nav-item">
                            <a style="color:#00ffff; font-weight: bold; letter-spacing: 1px;" class="nav-link" href="/policy">{{ __('Privacy Policy') }}</a>
                        </li>
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a style="color:#00ffff; font-weight: bold; letter-spacing: 1px;" class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a style="color:#00ffff; font-weight: bold; letter-spacing: 1px;" class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a style="color:#00ffff; font-weight: bold; letter-spacing: 1px;" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/display-groups-characters"> 
                                        {{ __('Display Games & Characters') }}</a> 
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <a class="dropdown-item" href="/changepassword";">
                                        {{ __('Change Password') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
            @yield('content')
        </main>
    </div>

    <footer class="container-fluid text-center">
        <p></p>
        <p style="font-size:15px"><a href="mailto:neonknightsrpg@gmail.com" style="color: white;"><u>neonknightsrpg@gmail.com</u></a></p>
        <p style="font-size:15px">2019 DRAWFOLIO S.L. <a href="/policy" style="color: white;"><u>Política de privacidad</u></a></p>
        <p style="font-size:15px">Images from Knightriders (1981) Please George Romero, don't sue us!</p>
        <p style="font-size:15px">Heavily inspired by Black Sabbath and El Señor de la Rueda (Gabriel Bermúdez Castillo, 1979)</p>
        <p></p>
    </footer>
</body>
</html>
