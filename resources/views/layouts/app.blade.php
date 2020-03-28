<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar--mobile container">
    <div class="navbar__brand">
        <a href="/">{{ config('app.name') }}</a>
    </div>
    <div class="user-nav user-nav--mobile">
        <img class="icon" src="{{ asset('icons/icon_user.svg') }}"/>
        @guest
            <ul class="user-nav__navigation">
                <li><a class="user-nav__link" href="{{ route('login') }}">Log In</a></li>
                <li><a class="user-nav__link" href="{{ route('register') }}">Register</a></li>
            </ul>
        @else
            <ul class="user-nav__navigation">
                <li><a class="user-nav__link" href="{{ route('login') }}">Profile</a></li>
                <li> {{/* POST .logout-form on click */}}
                    <a class="user-nav__link" href="{{ route('logout') }}"onclick="
                            event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Sign Out
                    </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </ul>
        @endguest
    </div>
</nav>

<nav class="sidebar">
    <div class="sidebar__brand">
        <a href="/">{{ config('app.name') }}</a>
    </div>
    <div id="sidebar__nav">
        <ul class="sidebar__group">
            Browse
            <li>Home</li>
            <li>New Tracks</li>
            <li>Top Charts</li>
        </ul>
        <ul class="sidebar__group">
            Library
            <li>Tracks</li>
            <li>Playlists</li>
            <li>Following</li>
        </ul>
        <ul class="sidebar__group">
            Other
            <li>Profile</li>
            <li>Settings</li>
        </ul>
    </div>
</nav>

<div class="search-bar">
    <div class="search-bar__content">
        <input type="text" class="search-bar__input" name="search-bar__input" placeholder="Search for artists, tracks..."/>
        <img class="icon" src="{{asset('icons/search-black.png')}}" alt="search"/>
    </div>
</div>

<div class="user-nav user-nav--desktop">
    <img class="icon" src="{{ asset('icons/icon_user.svg') }}"/>
    @guest
        <div class="user-nav__navigation">
            <li><a class="user-nav__link" href="{{ route('login') }}">Log In</a></li>
            <li><a class="user-nav__link" href="{{ route('register') }}">Register</a></li>
        </div>
    @else
        <div class="user-nav__navigation">
            <li><a class="user-nav__link" href="{{ route('login') }}">Profile</a></li>
            <li> {{/* POST .logout-form on click */}}
                <a class="user-nav__link" href="{{ route('logout') }}"onclick="
                        event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Sign Out
                </a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    @endguest
</div>

<div id="main" class="container">
    @yield('content')
</div>

<div class="bot-bar bot-bar--mobile">
    <div class="bot-bar__player">
        <img class="bot-bar__control-btn" src="" alt="previous"/>
        <img class="bot-bar__control-btn" src="" alt="play/pause"/>
        <img class="bot-bar__control-btn" src="" alt="next"/>
    </div>
    <div class="bot-bar__menu">
        <div class="bot-bar__link">
            <img class="bot-bar__menu-icon" alt="home"/>
            <span>Home</span>
        </div>
        <div class="bot-bar__link">
            <img class="bot-bar__menu-icon" alt="home"/>
            <span>Library</span>
        </div>
        <div class="bot-bar__link">
            <img class="bot-bar__menu-icon" alt="home"/>
            <span>Search</span>
        </div>
    </div>
</div>

<div class="bot-bar bot-bar--desktop">
    <div class="bot-bar__track-name">Listening to Unnamed by Various Artist</div>
    <div class="bot-bar__player">
        <img class="bot-bar__control-btn" src="" alt="previous"/>
        <img class="bot-bar__control-btn" src="" alt="play/pause"/>
        <img class="bot-bar__control-btn" src="" alt="next"/>
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/divers.js') }}"></script>
</body>
</html>
