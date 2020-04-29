@foreach ($tracks as $track)
    <div class="track">
        <div class="track__header">
            <img class="track__img" src="{{ $track->image }}"/>
            <div data-track="{{$track}}" data-author="{{$track->utilisateur->name}}" class="track__overlay" onclick="likeTrack(this)"></div>
            <div class="track__like" id="track__like_{{ $track->id }}" data-id="{{ $track->id }}" href="/like/{{ $track->id }}">
                <span class="track__like-count">{{ $track->likesCount }}</span>
                @if(Auth::check())
                    @if(Auth::user()->hasLiked($track->id))
                        <img class="track__like-icon" src="{{asset('icons/icon_like_2.png')}}" alt="like"/>
                    @else 
                        <img class="track__like-icon" src="{{asset('icons/icon_like.svg')}}" alt="like"/>
                    @endif
                @endif
            </div>
        </div>
        <div class="track__body">
            <div class="track__title">{{ $track->nom }}</div>
            <a class="track__author" href="/user/{{ $track->utilisateur->id }}">
                {{ $track->utilisateur->name }}
            </a>
        </div>
    </div>
@endforeach
