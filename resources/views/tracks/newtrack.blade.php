@extends('layouts.app')

@section('content')

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="form app-block" method="post" action="/track/new" enctype="multipart/form-data">
        <div class="app-block__header">
            <h2 class="app-block__title">Upload Track</h2>
        </div>
        @csrf
        <div class="form__row">
            <label class="form__label" for="nom">Nom</label>
            <input class="form__input" type="text" name="name" required placeholder="ex: Didier Super" value="{{ old('name') }}"/>
        </div>
        <div class="form__row">
            <label class="form__label-file" for="chanson">Fichier audio</label>
            <span id="track-select-button" class="form__file">Importer un fichier</span>
            <input id="track-input" class="form__input-file" type="file" name="chanson" required/>
        </div>
        <div class="form__row">
            <label class="form__label-file" for="chansonImage">Image</label>
            <span id="track-img-select-button" class="form__file">Importer un fichier</span>
            <input id="track-img-input" class="form__input-file" type="file" name="image" required/>
        </div>
        <div class="form__row">
            <label class="form__label" for="style">Style</label>
            <input class="form__input" type="text" name="style" required placeholder="ex: rap, techno, classique..." value="{{ old('style') }}"/>
        </div>

        <input class="form__btn" type="submit" name="submitNewTrack" value="Envoyer"/>
    </form>

@endsection
