<div class="form-inline">

    @auth
    <form method="POST" action="/posts/{{ $post->id }}/like">
        @csrf
        @if ($post->isLikedBy(auth()->user()))
            @method('DELETE')
        @endif

        <div class="flex items-center mx-3"
             style={{ $post->isLikedBy(auth()->user()) ? "color:blue" :  "color:grey"}}>

            <button type="submit">
                <i class="bi bi-hand-thumbs-up"></i>
            </button>

            <span>
                {{ $post->likes_count }}
            </span>
        </div>
    </form>

    <form method="POST" action="/posts/{{ $post->id }}/dislike">
        @csrf
        @if ($post->isDislikedBy(auth()->user()))
            @method('DELETE')
        @endif

        <div class="flex items-center"
             style={{ $post->isDislikedBy(auth()->user()) ? "color:red" :  "color:grey"}}>

            <button type="submit">
                <i class="bi bi-hand-thumbs-down"></i>
            </button>

            <span>
                {{ $post->dislikes_count }}
            </span>
        </div>
    </form>
    @endauth
    @guest
            <button>
                <i class="bi bi-hand-thumbs-up"></i>
            </button>

            <span>
                {{ $post->likes_count }}
            </span>

            <button>
                <i class="bi bi-hand-thumbs-down"></i>
            </button>

            <span>
                {{ $post->dislikes_count }}
            </span>
    @endguest
</div>
