@extends('layouts.app')

@section('content')
<h1 class="page-title">Profil: {{ $utilisateur->name }} </h1>

@include('landing._tracks', ['tracks' => $utilisateur->tracks])

@endsection
