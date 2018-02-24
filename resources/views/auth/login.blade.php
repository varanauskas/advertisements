@extends('layouts.app')

@push('meta')
    <meta name="robots" content="noindex" />
@endpush
@section('title', 'Login')

@section('content')
    <h1>Login</h1>
    <form action="{{ route('login') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" name="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Enter your email" value="{{ old('email') }}" required autofocus>
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
        <div class="form-check">
            <input type="checkbox" name="remember" id="remember" class="form-check-input">
            <label for="remember" class="form-check-label" {{ old('remember') ? 'checked' : '' }}>Remember Me</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-link" href="{{ route('password.request') }}">Forgot Your Password?</a>
    </form>
@endsection
