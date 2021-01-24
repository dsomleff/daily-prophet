<div class="form-inline mt-2 mb-2">
    @auth
        <likeable :post="{{ $post }}"></likeable>
    @endauth

    @guest
        <form action="{{ route('login') }}">
            <button type="submit" class="btn-secondary btn-sm mr-2">
                <i class="bi bi-hand-thumbs-up-fill"></i>
                <span class="text-white mr-2">
                    {{ $post->likes_count }}
                </span>
            </button>
        </form>

        <form action="{{ route('login') }}">
            <button type="submit" class="btn-secondary btn-sm mr-2">
                <i class="bi bi-hand-thumbs-down-fill"></i>
                <span class="text-white mr-2">
                    {{ $post->dislikes_count }}
                </span>
            </button>
        </form>
    @endguest
</div>
