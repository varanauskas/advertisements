@extends('layouts.app')

@push('meta')
    <meta name="robots" content="noindex" />
@endpush
@section('title', 'Login')

@section('content')
    <h1>{{ $exception->getMessage() }}</h1>
    <a href="{{ url()->previous() }}">Go back</a>
@endsection