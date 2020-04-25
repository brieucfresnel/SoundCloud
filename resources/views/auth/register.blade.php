@extends('layouts.app')

@section('content')

<form class="form register-form app-block" method="POST" action="{{ route('register') }}">
    @csrf

    <div class="form__row">
        <label for="name" class="form__label">{{ __('Name') }}</label>
        <input id="name" type="text" class="form__input{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>

    <div class="form__row">
        <label for="email" class="form__label">{{ __('E-Mail Address') }}</label>

        <input id="email" type="email" class="form__input{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <div class="form__row">
        <label for="password" class="form__label">{{ __('Password') }}</label>
        <input id="password" type="password" class="form__input{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>

    <div class="form__row">
        <label for="password-confirm" class="form__label">{{ __('Confirm Password') }}</label>
        <input id="password-confirm" type="password" class="form__input" name="password_confirmation" required>
    </div>

    <div class="form__row">
        <button type="submit" class="form__btn">
            {{ __('Register') }}
        </button>
    </div>
</form>
@endsection
