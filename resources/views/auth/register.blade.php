@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="form-group input-rounded">
        <label for="name" class="col-md-4 col-form-label ">{{ __('Name') }}</label>
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
            value="{{ old('name') }}" required autocomplete="name" autofocus>
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group input-rounded">
        <label for="username" class="col-md-4 col-form-label ">{{ __('Username') }}</label>
        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username"
            value="{{ old('username') }}" required autocomplete="username">
        @error('username')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group input-rounded">
        <label for="email" class="col-md-4 col-form-label ">{{ __('E-Mail Address') }}</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
            value="{{ old('email') }}" required autocomplete="email">

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group input-rounded">
        <label for="password" class="col-md-4 col-form-label ">{{ __('Password') }}</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
            name="password" required autocomplete="new-password">

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group input-rounded">
        <label for="password-confirm" class="col-md-4 col-form-label ">{{ __('Confirm Password') }}</label>

        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
            autocomplete="new-password">
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary">
            {{ __('Register') }}
        </button>
    </div>

</form>
@if(Route::has('login'))
<div class="signup-link">
    <p>Have an account yet?</p>
    <a href="{{route('login')}}">{{__('Login')}}</a>
</div>
@endif

@endsection