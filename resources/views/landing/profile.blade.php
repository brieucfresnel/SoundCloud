@extends('layouts.app')

@section('content')

    <div class="user-stats">
        <div>
            <!-- <img class="user-stats__picture" src="#" alt="profile picture"/> -->
            <div class="user-stats__info">
                <div class="user-stats__name">{{ $user->name }}</div>
                @auth
                    @if(Auth::id() != $user->id)
                        @if(Auth::user()->getFollowing->contains($user->id))
                            <a class="user-stats__follow-btn" href="/follow/{{ $user->id }}">Unfollow</a>
                        @else
                            <a class="user-stats__follow-btn" href="/follow/{{ $user->id }}">Follow</a>
                        @endif
                    @endif
                @endauth
                
            </div>
        </div>
        <div class="user-stats__stats">
            <div>
                <span class="user-stats__number">{{ $user->tracks()->count() }}</span>
                <span class="user-stats__stat">Tracks</span>
            </div>
            <div>
                <span class="user-stats__number">{{ $user->getLikes()->count() }}</span>
                <span class="user-stats__stat">Likes</span>
            </div>
            <div>
                <span class="user-stats__number">{{ $user->getFollowers()->count() }}</span>
                <span class="user-stats__stat">Followers</span>
            </div>
            <div>
                <span class="user-stats__number">{{ $user->getFollowing()->count() }}</span>
                <span class="user-stats__stat">Following</span>
            </div>
        </div>
    </div>

@endsection

