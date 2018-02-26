@extends('layouts.app')

@push('meta')
    <meta name="robots" content="noindex" />
@endpush
@section('title', 'Login')

@section('content')
    <h1>Error 403</h1>
    <h2>{{ $exception->getMessage() }}</h2>
    <a href="{{ url()->previous() }}">Go back</a>
@endsection