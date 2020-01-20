@extends('layouts.app')

@section('content')

<h1 class="page-title">Accueil</h1>
<h2 class="page-subtitle">Les plus récents</h2>

<div class="tracks">
    <audio id="audio-player" controls></audio>
    @include('landing._tracks')
</div>

@endsection
