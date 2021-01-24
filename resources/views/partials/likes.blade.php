<div class="form-inline">
    @auth
        <likeable :post="{{ $post }}"></likeable>
    @endauth

    @guest
        <form action="{{ route('login') }}">
            <button type="submit" class="btn-secondary btn-sm mr-2">
                <i class="bi bi-hand-thumbs-up-fill"></i>
            </button>
        </form>

        <span class="text-muted mr-2">
            {{ $post->likes_count }}
        </span>

        <form action="{{ route('login') }}">
            <button type="submit" class="btn-secondary btn-sm mr-2">
                <i class="bi bi-hand-thumbs-down-fill"></i>
            </button>
        </form>

        <span class="text-muted mr-2">
            {{ $post->dislikes_count }}
        </span>
    @endguest
</div>
