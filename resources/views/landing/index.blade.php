@extends('layouts.app')

@section('content')

    <div class="app-block">
        <div class="app-block__header">
            <h2>Featured Tracks</h2>
        </div>
        <div class="app-block__content">
            @include('landing._tracks', array('tracks' => $popular_tracks))
        </div>
    </div>

    <div class="app-block">
        <div class="app-block__header">
            <h2>Popular Tracks</h2>
        </div>
        <div class="app-block__content">
            @include('landing._tracks', array('tracks' => $popular_tracks))
        </div>
    </div>  

@endsection

