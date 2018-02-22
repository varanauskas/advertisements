<div class="card advertisement">
    
    <div class="card-body">
        <a href="{{ route('user.advertisements', $advertisement->user_id) }}"><h6 class="card-subtitle text-muted">{{ $advertisement->user->username }}</h6></a>
        <a href="{{ route('advertisements.show', $advertisement->id) }}"><h5 class="card-title">{{ str_limit($advertisement->title, 48) }}</h5></a>
        <p class="card-text">{{ str_limit($advertisement->description, 128) }}</p>
        <p class="card-text">
            <small class="text-muted" title="{{ $advertisement->created_at }}">Posted {{ $advertisement->created_at->diffFOrHumans() }}</small>
            @if ($advertisement->is_edited)
                <br><small class="text-muted" title="{{ $advertisement->updated_at }}">Last updated {{ $advertisement->updated_at->diffFOrHumans() }}</small>
            @endif
        </p>
        @can('update', $advertisement)
            <a href="{{ route('advertisements.edit', $advertisement->id) }}" class="card-link">Edit</a>
        @endcan
        @can('delete', $advertisement)
            <a href="#" class="card-link" data-toggle="modal" data-target="#deleteAdvertisement{{ $advertisement->id }}">
                Delete
            </a>
            <div class="modal fade" id="deleteAdvertisement{{ $advertisement->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteAdvertisement{{ $advertisement->id }}Label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteAdvertisement{{ $advertisement->id }}">Confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete the advertisement titled "{{ $advertisement->title }}"?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <form action="{{ route('advertisements.destroy', $advertisement->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        @endcan
    </div>
</div>