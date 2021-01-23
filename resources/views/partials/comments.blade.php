<!-- Comments -->
<h3 class="pb-3 mt-3 h5 font-italic border-bottom">
    Comments
</h3>

@foreach( $post->comments as $comment)
    <comment :attributes="{{ $comment }}" inline-template>
        <div class="row">
            <div class="col-md-8 pb-3" v-show="show">
                <p>
                    <strong>
                        {{ $comment->user->name }}

                        @if ($comment->user->name === $post->user->name)
                            <small class="text-muted"> author</small>
                        @endif
                    </strong>
                </p>

                <div v-if="editing">
                    <div class="form-group mt-2 mb-2 w-25">
                        <textarea class="form-control" rows="3" v-model="body"></textarea>
                    </div>

                    <button class="btn btn-sm btn-primary" @click="update">Update</button>
                    <button class="btn btn-sm btn-link" @click="editing = false">Cancel</button>
                </div>

                <p v-else v-text="body"></p>

                <small class="text-muted">
                    {{ $comment->created_at->diffForHumans() }}
                </small>

                <!-- Possibility to delete for author and admin -->
                @can('deleteComment', $comment)
                    <div>
                        <button type="submit" class="btn btn-sm btn-outline-primary" @click="editing = true">Edit</button>
                        <button type="submit" class="btn btn-sm btn-outline-danger" @click="destroy">Delete</button>
                    </div>
                @endcan
            </div>
        </div>
    </comment>
@endforeach

