@extends('layouts.app')

@section('content')

<div class="app-block">
    <div class="app-block__header">
        <h2 class="app-block__title">Tracks found</h2>
    </div>
    <div class="app-block__content">

        @if($tracks->count() == 0)
            <div class="app-block__subtitle">No track found for these keywords</div>
        @else
            @include('tracks._tracks', array('tracks' => $tracks))
        @endif
        
    </div>
</div>

<div class="app-block">
    <div class="app-block__header">
        <h2 class="app-block__title">Users found</h2>
    </div>
    <div class="app-block__content">

        @if($users->count() == 0)
            <div class="app-block__subtitle">No user found for these keywords</div>
        @else
            @include('users._users', array('users' => $users))
        @endif
        
    </div>
</div>

@endsection