<!-- Comments -->
<h3 class="pb-2 mt-4 h5 font-italic border-bottom">
    Comments
</h3>

@foreach( $post->comments as $comment)
    <comment :attributes="{{ $comment }}" inline-template>
        <div class="row">
            <div class="col-md-8 pb-3" v-show="show">
                <p>
                    <strong>
                        <a href="{{ route('users.posts', $post->user) }}">
                            {{ $comment->user->name }}
                        </a>
                        @if ($comment->user->name === $post->user->name)
                            <small class="text-muted"> author</small>
                        @endif
                    </strong>
                </p>

                <div v-if="editing">
                    <div class="form-group mt-2 mb-2 w-25">
                        <textarea class="form-control" rows="3" v-model="body"></textarea>
                    </div>

                    <button class="btn btn-sm btn-info" @click="update">Update</button>
                    <button class="btn btn-sm btn-link text-info" @click="editing = false">Cancel</button>
                </div>

                <p v-else v-text="body"></p>

                <small class="text-muted">
                    {{ $comment->created_at->diffForHumans() }}
                </small>

                <!-- Possibility to delete for author and admin -->
                @can('deleteComment', $comment)
                    <div>
                        <button
                            type="submit"
                            class="btn btn-sm btn-outline-info"
                            @click="editing = true"
                        >Edit</button>

                        <button
                            type="submit"
                            class="btn btn-sm btn-outline-danger"
                            @click="destroy"
                            onclick="return confirm('Are you sure?');"
                        >Delete</button>
                    </div>
                @endcan
            </div>
        </div>
    </comment>
@endforeach

