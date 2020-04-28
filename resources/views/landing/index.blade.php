@extends('layouts.app')

@section('content')

    <div class="app-block">
        <div class="app-block__header">
            <h2 class="app-block__title">Featured Tracks</h2>
            <div class="app-block__subtitle">Discover recently uploaded tracks</div>
        </div>
        <div class="app-block__content">
            @include('tracks._tracks', array('tracks' => $recent_tracks))
        </div>
    </div>

    <div class="app-block">
        <div class="app-block__header">
            <h2 class="app-block__title">Popular Tracks</h2>
            <div class="app-block__subtitle">Discover today’s most played tracks</div>
        </div>
        <div class="app-block__content">
            @include('tracks._tracks', array('tracks' => $popular_tracks))
        </div>
    </div>

    <div class="app-block">
        <div class="app-block__header">
            <h2 class="app-block__title">People To Follow</h2>
            <div class="app-block__subtitle">Discover Sound's rising stars</div>
        </div>
        <div class="app-block__content">
            @include('users._users', array('users' => $users))
        </div>
    </div>
@endsection

