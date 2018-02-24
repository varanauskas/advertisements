@extends('layouts.app')

@section('title', 'Edit advertisement')

@section('content')
    <h1>Edit</h1>
    <form action="{{ route('advertisements.update', $advertisement->id) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="Title" value="{{ old('title', $advertisement->title) }}" required autofocus>
            @if ($errors->has('title'))
                <div class="invalid-feedback">
                    {{ $errors->first('title') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="10" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="Description">{{ old('description', $advertisement->description) }}</textarea>
            @if ($errors->has('description'))
                <div class="invalid-feedback">
                    {{ $errors->first('description') }}
                </div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection