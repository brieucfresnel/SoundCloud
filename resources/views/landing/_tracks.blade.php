<div>
    @foreach ($tracks as $track)
        <div class="track">
            <img data-file="{{ $track->fichier }}" class="icon play-button" src="{{ asset('icons/play-button-black.png')}}"/>
            <span class="track-title">{{ $track->nom }}</span>
            <a href="utilisateur/{{ $track->utilisateur->id }}" class="track-author">par {{ $track->utilisateur->name }}</a>
        </div>
    @endforeach
</div>
