@extends('layouts.app')

@section('content')
<h1 class="page-title">Profil: {{ $utilisateur->name }} </h1>

@auth
    @if(Auth::id() != $utilisateur->id)
        @if(Auth::user()->getFollowing->contains($utilisateur->id))
            Je le suis
        @else
            Je ne le suis pas
        @endif
    @endif
@endauth

<ul>
    <li>{{ $utilisateur->tracks()->count() }} titres mis en ligne</li>
    <li>Il suit {{ $utilisateur->getFollowing()->count() }} personnes</li>
    <li>Il est suivi par {{ $utilisateur->getFollowers()->count() }} personnes</li>
</ul>

@include('landing._tracks', ['tracks' => $utilisateur->tracks])

@endsection
