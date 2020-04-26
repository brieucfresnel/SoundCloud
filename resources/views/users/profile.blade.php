@extends('layouts.app')

@section('content')

    <div class="user-stats">
        <div>
            <!-- <img class="user-stats__picture" src="#" alt="profile picture"/> -->
            <div class="user-stats__info">
                <div class="user-stats__img-container">
                    <img class="user-stats__img" src="{{ $user->image }}" alt="profile photo"/>
                </div>
                <div class="user-stats__name">{{ $user->name }}</div>
                @auth
                    @if(Auth::id() != $user->id)
                        @if(Auth::user()->following != NULL)
                            @if(Auth::user()->following->contains($user->id))
                                <a class="user-stats__follow-btn" href="/follow/{{ $user->id }}">Unfollow</a>
                            @else
                                <a class="user-stats__follow-btn" href="/follow/{{ $user->id }}">Follow</a>
                            @endif
                        @endif
                    @endif
                @endauth
                
            </div>
        </div>
        <div class="user-stats__stats">
            <div>
                <span class="user-stats__number">{{ $user->tracks->count() }}</span>
                <span class="user-stats__stat">Tracks</span>
            </div>
            <div>
                <span class="user-stats__number">{{ $user->likesReceived() }}</span>
                <span class="user-stats__stat">Likes</span>
            </div>
            <div>
                <span class="user-stats__number">{{ $user->followers()->count() }}</span>
                <span class="user-stats__stat">Followers</span>
            </div>
            <div>
                <span class="user-stats__number">{{ $user->following()->count() }}</span>
                <span class="user-stats__stat">Following</span>
            </div>
            <div>
                <span class="user-stats__number">{{ $user->playlists()->count() }}</span>
                <span class="user-stats__stat">Playlists</span>
            </div>
        </div>
    </div>

    <div class="user-tracks">
        <div class="app-block">
            <div class="app-block__header">
                <h2 class="app-block__title">Tracks</h2>
            </div>
            <div class="app-block__content">
                @if($user->tracks()->count() != 0)
                    @include('tracks._tracks', array('tracks' => $user->tracks))
                @else
                    <div class="app-block__subtitle">This user has not uploaded any tracks yet</div>
                @endif
            </div>
        </div>  
    </div>

    <div class="user-tracks">
        <div class="app-block">
            <h2 class="app-block__title">Playlists</h2>

            @if(!$user->playlists->isEmpty())
                @foreach ($user->playlists as $playlist)
                
                    <div class="app-block__playlist-name">{{ $playlist->nom }}</div>
                    <div class="app-block__content">
                        @include('tracks._tracks', array('tracks' => $playlist->tracks))
                    </div>
                @endforeach
            @else
                <div class="app-block__subtitle">This user has not made any playlists yet</div>
            @endif
        </div>  
    </div>

@endsection

