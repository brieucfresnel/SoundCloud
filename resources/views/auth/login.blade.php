@extends('layouts.app')

@section('content')

<form class="form login-form app-block" method="POST" action="{{ route('login') }}">
    @csrf

    <div class="form__row">
        <label for="email" class="form__label">{{ __('E-Mail Address') }}</label>
        <input id="email" type="email" class="form__input{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

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
        <div class="form__check">
            <input class="form__check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form__label form__check-label" for="remember">
                {{ __('Remember Me') }}
            </label>
        </div>
    </div>

    <button type="submit" class="form__btn">
        {{ __('Login') }}
    </button>

    @if (Route::has('password.request'))
        <a class="form__link" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
    @endif
</form>
@endsection
