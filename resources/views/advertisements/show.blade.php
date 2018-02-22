@extends('layouts.app')

@section('content')
<div class="card advertisement my-3">
    <div class="card-body">
        <a href="{{ route('user.advertisements', $advertisement->user_id) }}"><h6 class="card-subtitle text-muted">{{ $advertisement->user->username }}</h6></a>
        <a href="{{ route('advertisements.show', $advertisement->id) }}"><h5 class="card-title">{{ str_limit($advertisement->title, 48) }}</h5></a>
        <p class="card-text">{!! nl2br(e($advertisement->description)) !!}</p>
        <p class="card-text">
            <small class="text-muted" title="{{ $advertisement->created_at }}">Posted {{ $advertisement->created_at->diffFOrHumans() }}</small>
            @if ($advertisement->is_edited)
                <br><small class="text-muted" title="{{ $advertisement->updated_at }}">Last updated {{ $advertisement->updated_at->diffFOrHumans() }}</small>
            @endif
        </p>
        @can('update', $advertisement)
            <a href="{{ route('advertisements.edit', $advertisement->id) }}" class="card-link">Edit</a>
        @endcan
    </div>
</div>
@endsection
