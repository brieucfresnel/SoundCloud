<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>

<nav class="main-navbar container">
    <div class="navbar-brand">
        <img id="logo" src="{{ asset('icons/play-button-white.png') }}" alt=""/>
        <a href="/">{{ config('app.name') }}</a>
    </div>

    <!-- Authentication Links -->
    <ul class="navigation">
        @guest
            <li><a href="{{ route('login') }}">Connexion</a></li>
            <li><a href="{{ route('register') }}">Inscription</a></li>
        @else
            <li>
                <a href="{{ route('logout') }}"
                   onclick="
                       event.preventDefault();
                       document.getElementById('logout-form').submit();">
                       Déconnexion
                </a>
            </li>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        @endguest
    </ul>
</nav>
<div id="main" class="container">
    @yield('content')
</div>
<!-- Scripts -->
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/divers.js') }}"></script>
</body>
</html>
