<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<div class="container">
    @foreach($posts as $post)
        <ul class="list-group">
            <li class="list-group-item">
                <a href="{{ route('posts.show', $post) }}">
                    {{ $post->title }}
                </a> by {{ $post->user->name }}

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
            </li>
        </ul>
    @endforeach

        {{ $posts->links() }}
</div>
