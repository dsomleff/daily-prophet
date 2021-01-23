<!-- Comments -->
<h3 class="pb-3 mt-3 h5 font-italic border-bottom">
    Comments
</h3>

@foreach( $post->comments as $comment)
    <div class="row">
        <div class="col-md-8 pb-3">
            <p><strong>
                    {{ $comment->user->name }}
                    @if ($comment->user->name === $post->user->name)
                        <small class="text-muted"> author</small>
                    @endif
                </strong></p>
            <p>
                {{ $comment->body }}
            </p>
            <small class="text-muted">
                {{ $comment->created_at->diffForHumans() }}
            </small>

            <!-- Possibility to delete for author and admin -->
            @can('deleteComment', $comment)
                <form method="POST" action="{{ route('comments.destroy', $comment) }}">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            @endcan
        </div>
    </div>
@endforeach


<!-- Leave the comment -->
<h3>Leave your comment</h3>
@auth
    <form method="POST" action="/comment/">
        @csrf

        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <div class="form-group mt-2 mb-2 w-25">
                <textarea
                    class="form-control @error('body') border border-danger @enderror"
                    rows="3"
                    name="body">{{ old('body') }}</textarea>

            @error('body')
                <div class="text-danger">
                    {{ $errors->first('body') }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-sm btn-primary">Save</button>
        </div>
    </form>
@endauth
@guest
    Login to leave comment.
@endguest
