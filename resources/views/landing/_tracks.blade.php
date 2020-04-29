
@foreach ($tracks as $track)
    <div class="track">
        <div class="track__header" data-file="{{ $track->fichier }}">
            <img class="track__img" src="{{ asset('img/default_music_bg.png') }}"/>
            <div class="track__overlay"></div>
        </div>
        <div class="track__body">
            <div class="track__title">{{ $track->nom }}</div>
            <a class="track__author" href="/utilisateur/{{ $track->utilisateur->id }}">
                {{ $track->utilisateur->name }}
            </a>
        </div>

    </div>
@endforeach
