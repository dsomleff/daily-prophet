<div class="row">
    @can('update', $post)
        <form method="GET" action="{{ route('posts.edit', $post) }}">
            <button type="submit" class="btn btn-outline-info mt-2 mb-2 ml-4 mr-2">
                Edit
            </button>
        </form>
    @endcan

    @can('delete', $post)
        <form method="POST" action="{{ route('posts.destroy', $post) }}">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="btn btn-outline-danger mt-2 mb-2"
                    onclick="return confirm('Are you sure?');"
            >Delete</button>
        </form>
    @endcan
</div>
