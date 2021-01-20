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

    <flash message="{{ session('flash') }}"></flash>
</div>
