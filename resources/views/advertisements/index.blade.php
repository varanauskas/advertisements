@extends('layouts.app')

@section('content')
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
