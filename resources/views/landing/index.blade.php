@extends('layouts.app')

@section('content')

<div class="tracks">
    <audio id="audio-player" controls></audio>
    @include('landing._tracks')
</div>

@endsection
