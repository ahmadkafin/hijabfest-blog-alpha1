@extends('layouts.app')

@section('content')

<form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="form-group input-rounded">
        <label for="username" class="col-md-4 col-form-label">{{ __('Username or Email') }}</label>
        <input id="username" type="username" class="form-control @error('username') is-invalid @enderror"
            name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
        @error('username')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group input-rounded">
        <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
            name="password" required autocomplete="current-password">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-inline">
        <div class="checkbox">
            <label>
                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>{{ __('Remember Me') }} <i class="input-frame"></i>
            </label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">
        {{ __('Login') }}
    </button>

    @if (Route::has('password.request'))
    <a class="btn btn-link" href="{{ route('password.request') }}">
        {{ __('Forgot Your Password?') }}
    </a>
    @endif
</form>
@if(Route::has('register'))
<div class="signup-link">
    <p>Don't have an account yet?</p>
    <a href="{{route('register')}}">{{__('Sign-up')}}</a>
</div>
@endif

@endsection