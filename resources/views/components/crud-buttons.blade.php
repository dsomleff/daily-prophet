<div class="form-inline">
    @can('update', $post)
        <form method="GET" action="{{ route('posts.edit', $post) }}">
            <button type="submit" class="btn btn-warning">Edit</button>
        </form>
    @endcan

    @can('delete', $post)
        <form method="POST" action="{{ route('posts.destroy', $post) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    @endcan
</div>
