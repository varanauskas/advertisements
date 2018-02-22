@extends('layouts.app')

@section('content')
<h1>{{ $user->username }}'s advertisments</h1>
@foreach ($advertisements->chunk(3) as $chunk)
    <div class="row my-3">
        @foreach ($chunk as $advertisement)
            <div class="col-md-4">
                @component('advertisements.card', compact('advertisement'))
                @endcomponent
            </div>
        @endforeach
    </div>
@endforeach
<nav aria-label="Page navigation">
    {{ $advertisements->links() }}
</nav>
@endsection
