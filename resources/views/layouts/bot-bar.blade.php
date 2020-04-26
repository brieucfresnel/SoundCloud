<div id="bot-bar" class="bot-bar">
    <div class="audio-player">
        <audio id="audio">
            <source src="" type="audio/mp3">
        </audio>

        <div class="player-controls">
            <div class="playlist-controls">
                <div class="playlist-controls__menu">
                    <div class="playlist-controls__list">
                        @if(Auth::check() && Auth::user()->playlists->count() != 0)
                            @if(!empty(Session::get('currentTrack')[0]))
                                <div class="playlist-controls__title">Choose playlist to add song to</div>
                                
                                @foreach(Auth::user()->playlists as $playlist)
                                    <a id="addTrackToPlaylist" href="/playlist/add/{{ $playlist->id }}/{{ Session::get('currentTrack')[0]['id'] }}" class="playlist-controls__pl-name">{{ $playlist->nom }}</a>
                                @endforeach
                            @else 
                                <div class="playlist-controls__title">You must select a track first</div>
                            @endif
                        @else
                            <div>You haven't created any playlist yet</div>
                        @endif
                    </div>
                    <div class="playlist-controls__title">Create a new playlist</div>
                    <form method="post" action="/playlist/new" class="form">
                        @csrf
                        <input class="playlist-controls__input" type="text" name="playlist_name" placeholder="Playlist Name"/>
                        <input class="playlist-controls__btn" type="submit" value="Create playlist →"/>
                    </form>
                </div>
                <div class="player-controls__btn player-controls__playlist-btn">
                    <img class="player-controls__btn-icon" src="{{asset('icons/icon_playlist.png')}}"/>
                </div>
            </div>

            <div id="currentTrackName" class="bot-bar__track-name">Click on a track to play it</div>
            
            <button id="playAudio" class="player-controls__btn" onClick="toggleAudio()">
                 <img id="playerMainBtnImg" class="player-controls__btn-icon" src="{{asset('icons/icon_play.svg')}}"/>
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