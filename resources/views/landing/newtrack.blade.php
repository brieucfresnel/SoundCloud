@extends('layouts.app')

@section('content')

    <h1 class="page-title">Ajouter un son</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="/chanson/upload" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <label for="nom">Nom</label>
            <input type="text" name="name" required placeholder="ex: Didier Super" value="{{ old('name') }}"/>
        </div>
        <div class="form-row">
            <label for="chanson">Fichier audio</label>
            <input type="file" name="chanson" required/>
        </div>
        <div class="form-row">
            <label for="style">Style</label>
            <input type="text" name="style" required placeholder="ex: rap, techno, classique..." value="{{ old('style') }}"/>
        </div>

        <input type="submit" name="submitNewTrack" value="Envoyer"/>

    </form>

@endsection
