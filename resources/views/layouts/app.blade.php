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
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700&display=swap" rel="stylesheet">
</head>

<body>

<nav class="main-navbar container">
    <div class="navbar-brand">
        <a href="/">{{ config('app.name') }}</a>
    </div>

    <!-- Authentication Links -->
    <ul class="navigation">
        @guest
            <li><a href="{{ route('login') }}">Connexion</a></li>
            <li><a href="{{ route('register') }}">Inscription</a></li>
        @else
            <li><a href="#"><img class="icon" src="{{ asset('icons/search-yellow.png') }}" alt="search"/></a></li>
            <li><a href="/utilisateur/{{ Auth::id() }}">Profile</a></li>
            <li><a href="{{ route('logout') }}"
                   onclick="
                       event.preventDefault();
                       document.getElementById('logout-form').submit();">
                       Sign Out
            </a></li>
            <li><a class="cta" href="/chanson/nouvelle">Upload</a></li>



            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        @endguest
    </ul>
</nav>
<div id="main" class="container">
    @yield('content')
</div>

<footer class="container">
    footer
</footer>
<!-- Scripts -->
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/divers.js') }}"></script>
</body>
</html>
