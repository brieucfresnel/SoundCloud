@extends('layouts.app')

@section('content')

<div>

    <h2>Popular Tracks</h2>
    @include('landing._tracks', array('tracks' => $popular_tracks))

    <h2>Recent Tracks</h2>
    @include('landing._tracks', array('tracks' => $recent_tracks))

</div>

@endsection
