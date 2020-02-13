<div class="tracks-container">
    @foreach ($tracks as $track)
        <div class="track">
            <div class="track-overlay"></div>
            <div class="track-description">
                <div class="track-title">{{ $track->nom }}</div>
                <a href="/utilisateur/{{ $track->utilisateur->id }}" class="track-author">
                    {{ $track->utilisateur->name }}
                </a>
            </div>

        </div>
    @endforeach
</div>
