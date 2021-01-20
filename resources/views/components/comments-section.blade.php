<div class="container">
    @forelse( $post->comments as $comment)
        <p><strong>{{ $comment->user->name }} </strong></p>
        {{ $comment->body }}
        <p class="font-weight-lighter">
            at {{ $comment->created_at->diffForHumans() }}
        </p>

        @can('deleteComment', $comment)
            <form method="POST" action="{{ route('comments.destroy', $comment) }}">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>

            <div class="container">
                <hr>
            </div>
        @endcan
    @empty
        No comments.
    @endforelse
</div>
