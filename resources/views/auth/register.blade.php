@extends('layouts.app')

@push('meta')
    <meta name="robots" content="noindex" />
@endpush
@section('title', 'Register')

@section('content')
    <h1>Register</h1>
    <form action="{{ route('register') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" placeholder="Your username" value="{{ old('username') }}" required autofocus>
            @if ($errors->has('username'))
                <div class="invalid-feedback">
                    {{ $errors->first('username') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" name="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Enter your email" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <div class="invalid-feedback">
                    {{ $errors->first('email') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" required>
            @if ($errors->has('password'))
                <div class="invalid-feedback">
                    {{ $errors->first('password') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="password-confirm">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password-confirm" class="form-control" placeholder="Confirm your password" required>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
@endsection
