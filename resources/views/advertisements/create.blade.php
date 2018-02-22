@extends('layouts.app')

@section('content')
<h1>Post a new advertisement</h1>
<form action="{{ route('advertisements.store') }}" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="Title" value="{{ old('title') }}" required autofocus>
        @if ($errors->has('title'))
            <div class="invalid-feedback">
                {{ $errors->first('title') }}
            </div>
        @endif
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" rows="10" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="Description">{{ old('description') }}</textarea>
        @if ($errors->has('description'))
            <div class="invalid-feedback">
                {{ $errors->first('description') }}
            </div>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
