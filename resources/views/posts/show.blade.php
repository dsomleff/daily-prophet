<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<div class="container">
    <h1 class="display-4">{{ $post->title }}</h1>
    <p class="blockquote-footer">Posted by {{ $post->user->name }}</p>

    <p class="lead">
        {{ $post->body }}
    </p>

    <a href="{{ route('posts.index') }}">
        <button type="button" class="btn btn-link">Back</button>
    </a>

<div class="container">
    <hr>
</div>

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

<div class="container">
    <h3>Leave your comment</h3>
    @auth
    <form method="POST" action="/comment/">
        @csrf

        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <div class="form-group">
            <textarea
                class="form-control @error('body') border border-danger @enderror"
                rows="3"
                name="body"
            >
                    {{ old('body') }}
                </textarea>

            @error('body')
            <div class="text-danger">
                {{ $errors->first('body') }}
            </div>
            @enderror
        </div>

        <div class="form-group form-check">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
        @endauth
    @guest
        Login to leave comment.
    @endguest
</div>
