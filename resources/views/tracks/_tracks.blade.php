@foreach ($tracks as $track)
    <div class="track">
        <div class="track__header">
            <img class="track__img" src="{{ $track->image }}"/>
        <div data-track="{{$track}}" data-author="{{$track->utilisateur->name}}" class="track__overlay"></div>
            <a href="/like/{{ $track->id }}"><img class="track__like-icon" src="{{asset('icons/icon_like.svg')}}" alt="like"/></a>
        </div>
        <div class="track__body">
            <div class="track__title">{{ $track->nom }}</div>
            <a class="track__author" href="/user/{{ $track->utilisateur->id }}">
                {{ $track->utilisateur->name }}
            </a>
        </div>
    </div>
@endforeach
