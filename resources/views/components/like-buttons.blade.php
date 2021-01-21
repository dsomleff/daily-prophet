<div class="form-inline">
    @auth
        <likeable :post="{{ $post }}"></likeable>
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
