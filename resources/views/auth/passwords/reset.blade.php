@extends('layouts.app')

@push('meta')
    <meta name="robots" content="noindex" />
@endpush
@section('title', 'Reset Password')

@section('content')
    <h1>Reset Password</h1>
    <form method="POST" action="{{ route('password.email') }}">
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
        <div class="form-group">
            <label for="password-confirm">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password-confirm" class="form-control" placeholder="Confirm your password" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
