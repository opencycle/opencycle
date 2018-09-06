<div class="col-md-4">
    <div class="card mb-4 box-shadow">
        <a href="{{ route('posts.show', $post) }}">
            <img class="card-img-top" alt="Thumbnail" src="https://placeimg.com/350/350/any">
        </a>
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->description }}</p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a class="btn btn-sm btn-outline-primary" href="{{ route('posts.show', $post) }}">View</a>
                    <a class="btn btn-sm btn-outline-primary" href="{{ route('posts.show', $post) }}">Reply</a>
                    @can('update', $post)
                        <a class="btn btn-sm btn-outline-primary" href="{{ route('posts.edit', $post) }}">
                            Edit
                        </a>
                    @endcan
                    @can('delete', $post)
                        <a href="{{ route('posts.destroy', $post) }}"
                           onclick="event.preventDefault(); document.getElementById('delete-form-{{ $post->id }}').submit();" class="btn btn-sm btn-outline-danger" role="button">Delete</a>
                        <form id="delete-form-{{ $post->id }}" action="{{ route('posts.destroy', $post) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    @endcan
                </div>
                <small class="text-muted">{{ $post->created_at }}</small>
            </div>
        </div>
    </div>
</div>
