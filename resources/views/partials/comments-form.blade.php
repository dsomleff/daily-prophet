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
                    name="body"
                    required
                >{{ old('body') }}</textarea>

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
