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
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700&display=swap" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar--mobile container">
    <div class="navbar__brand">
        <a href="/">{{ config('app.name') }}</a>
    </div>
    <div class="user-nav user-nav--mobile">
        <img class="icon" onClick="toggleUserNav()" src="{{ asset('icons/icon_user.svg') }}"/>
        @guest
            <ul id="user-nav" class="user-nav__navigation">
                <li><a class="user-nav__link" href="{{ route('login') }}">Log In</a></li>
                <li><a class="user-nav__link" href="{{ route('register') }}">Register</a></li>
            </ul>
        @else
            <ul id="user-nav" class="user-nav__navigation">
                <li><a class="user-nav__link" href="{{ route('login') }}">Profile</a></li>
                <li>
                    <a class="user-nav__link" href="{{ route('logout') }}" onclick="
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
    <div class="sidebar__container">
        <div class="sidebar__brand">
            <a href="/">{{ config('app.name') }}</a>
        </div>
        <div id="sidebar__nav">
            <ul class="sidebar__group">
                Browse
                <li><a class="sidebar__link" href="/">Home</a></li>
                <li><a class="sidebar__link" href="#">New Tracks</a></li>
                <li><a class="sidebar__link" href="#">Top Charts</a></li>
            </ul>
            <ul class="sidebar__group">
                Library
                <li><a class="sidebar__link" href="#">Tracks</a></li>
                <li><a class="sidebar__link" href="#">Playlists</a></li>
                <li><a class="sidebar__link" href="#">Following</a></li>
                <li><a class="sidebar__link" href="/track/new">Upload Track</a></li>

            </ul>
            <ul class="sidebar__group">
                Other
                <li><a class="sidebar__link" href="#">Profile</a></li>
                <li><a class="sidebar__link" href="#">Settings</a></li>
            </ul>
        </div>
    </div>
</nav>

<main>
    <div class="search-bar">
        <form action="/search" method="post" class="search-bar__content">
            @csrf
            <input type="text" class="search-bar__input" name="search_content" placeholder="Search for artists, tracks..."/>
            <img class="icon" src="{{asset('icons/search-black.png')}}" alt="search"/>
        </form>

        <div class="user-nav user-nav--desktop">
            <img class="user-nav__icon" onClick="toggleUserNav()" src="{{ asset('icons/icon_user_desktop.svg') }}"/>
            @guest
                <div class="user-nav__navigation">
                    <li><a class="user-nav__link" href="{{ route('login') }}">Log In</a></li>
                    <li><a class="user-nav__link" href="{{ route('register') }}">Register</a></li>
                </div>
            @else
                <div class="user-nav__navigation">
                    <li><a class="user-nav__link" href="/user/{{ Auth::user()->id }}">Profile</a></li>
                    <li>
                        <a class="user-nav__link" href="{{ route('logout') }}" onclick="
                                event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Sign&nbsp;Out
                        </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            @endguest
        </div>
    </div>

    <div class="app-content">
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
        <div class="audio-player">
            <audio id="audio">
                <source src="" type="audio/mp3">
            </audio>

            <div class="player-controls">
                <div id="currentTrackName" class="bot-bar__track-name">Click on a track to play it</div>
                <button id="playAudio" class="player-controls__toggle-btn" onClick="toggleAudio()">
                     <img id="playerMainBtnImg" class="player-controls__toggle-btn-icon" src="{{asset('icons/icon_play.svg')}}"/>
                </button>
            </div>
        </div>
        <!--
            <div class="bot-bar__player">
                <img class="bot-bar__control-btn" src="{{asset('icons/icon_previous.svg')}}" alt="previous"/>
                <img class="bot-bar__control-btn" src="{{asset('icons/icon_pause.svg')}}" alt="play/pause"/>
                <img class="bot-bar__control-btn" src="{{asset('icons/icon_next.svg')}}" alt="next"/>
            </div>
         -->
    </div>
</main>

<!-- Scripts -->
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/howler.min.js') }}"></script>
<script src="{{ asset('js/divers.js') }}"></script>
</body>
</html>
