@extends('layouts.app')

@section('content')

<div class="app-block">
    <div class="app-block__header">
        <h2 class="app-block__title">{{$playlist->nom}}</h2>
    </div>
    <div class="app-block__content">
        @if(!$playlist->tracks->isEmpty())
            @include('tracks._tracks', array('tracks' => $playlist->tracks()))
        @else
            <div class="app-block__subtitle">This playlist is empty</div>
        @endif
    </div>
</div>  

@endsection