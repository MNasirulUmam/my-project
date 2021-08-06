@extends('layouts.login')
@section('breadcrumbs')
@section('content')

<form method="POST" action="{{ route('register') }}">
@csrf

<div class="form-group">
    <label>{{ __('Username') }}</label>

        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Username">

        @error('username')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

</div>

<div class="form-group">
    <label>{{ __('First Name') }}</label>

        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus placeholder= "Frist Name">

        @error('first_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
</div>

<div class="form-group">
    <label>{{ __('Last Name') }}</label>

        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus placeholder="Last Name">

        @error('last_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    
</div>

<div class="form-group">
    <label>{{ __('E-Mail Address') }}</label>

        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

</div>

<div class="form-group">
    <label>{{ __('Phone') }}</label>

        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Phone">

        @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    
</div>

<div class="form-group">
    <label>{{ __('Password') }}</label>

        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

</div>

<div class="form-group">
    <label>{{ __('Confirm Password') }}</label>
    
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Password Confirmation">
    
</div>

<div class="form-group">
    <label>{{ __('Select Companies') }}</label>

        <select class="form-control @error('company') is-invalid @enderror" name="company" id="select_company" required>
            <option value="">-- Select Company --</option>
            @foreach($company as $companys)
                <option value="{{$companys->id}}">{{$companys->name_companie}}</option>
            @endforeach
        </select>

        @error('company')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

</div>

<div class="form-group">
    <label>{{ __('Select Department') }}</label>

        <select class="form-control @error('departement') is-invalid @enderror" name="departement" id="select_department" required>
            <option value="">-- Select Department --</option>
            @foreach($departement as $departments)
                <option value="{{$departments->id}}">{{$departments->name_departement}}</option>
            @endforeach
        </select>

        @error('departments')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

</div>
<div class="form-group">
        <button type="submit" class="btn btn-primary">
            {{ __('Register') }}
        </button>
</div>
@endsection
