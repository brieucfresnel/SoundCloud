
@foreach ($tracks as $track)
    <div class="track" data-file="{{ $track->fichier }}">
        <img class="track__img" src="{{ asset('img/default_music_bg.png') }}"/>
        <div class="track__overlay"></div>
        <div class="track__description">
            <div class="track__title">{{ $track->nom }}</div>
            <a class="track__author" href="/utilisateur/{{ $track->utilisateur->id }}">
                {{ $track->utilisateur->name }}
            </a>
        </div>

    </div>
@endforeach
