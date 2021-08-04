@extends('layouts.login')
@section('breadcrumbs')

@section('content')

<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="form-group">
        <label>{{ __('username') }}</label>

            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Username">

            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    </div>

    <div class="form-group ">
        <label>{{ __('Password') }}</label>

            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        
    </div>

    <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
    </div>

    <div class="form-group">
            <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">
                {{ __('Login') }}
            </button>

            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
    </div>
    <div class="register-link m-t-15 text-center">
        <p>Already have account ? <a href="{{route('register')}}"> Sign in</a></p>
    </div>
</form>
@endsection
