@forelse( $post->comments as $comment)
    <comment :attributes="{{ $comment }}" inline-template>
        <div class="container" v-show="show">
            <p><strong>{{ $comment->user->name }} </strong></p>

            <div v-if="editing">
                <div class="form-group">
                    <textarea class="form-control" v-model="body"></textarea>
                </div>

                <button class="btn btn-xs btn-primary" @click="update">Update</button>
                <button class="btn btn-xs btn-link" @click="editing = false">Cancel</button>
            </div>

            <div v-else v-text="body"></div>

            <p class="font-weight-lighter">
                at {{ $comment->created_at->diffForHumans() }}
            </p>

            @can('deleteComment', $comment)
                <button type="submit" class="btn btn-warning" @click="editing = true">Edit</button>
                <button type="submit" class="btn btn-danger" @click="destroy">Delete</button>
{{--                <form method="POST" action="{{ route('comments.destroy', $comment) }}">--}}
{{--                    @csrf--}}
{{--                    @method('DELETE')--}}
{{--    --}}
{{--                    <button type="submit" class="btn btn-danger">Delete</button>--}}
{{--                </form>--}}

                <div class="container">
                    <hr>
                </div>
            @endcan
        </div>
    </comment>
@empty
    No comments.
@endforelse

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
