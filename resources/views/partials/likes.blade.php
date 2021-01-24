{{--<div class="row">--}}
{{--    @auth--}}
{{--        <form method="POST" action="/posts/{{ $post->id }}/like">--}}
{{--            @csrf--}}
{{--            @if ($post->isLikedBy(auth()->user()))--}}
{{--                @method('DELETE')--}}
{{--            @endif--}}

{{--            <div class="flex items-center mx-3"--}}
{{--                 style={{ $post->isLikedBy(auth()->user()) ? "color:blue" :  "color:grey"}}>--}}
{{--                <button type="submit">--}}
{{--                    <i class="bi bi-hand-thumbs-up"></i>--}}
{{--                </button>--}}

{{--                <span>--}}
{{--                    {{ $post->likes_count }}--}}
{{--                </span>--}}
{{--            </div>--}}
{{--        </form>--}}

{{--        <form method="POST" action="/posts/{{ $post->id }}/dislike">--}}
{{--            @csrf--}}
{{--            @if ($post->isDislikedBy(auth()->user()))--}}
{{--                @method('DELETE')--}}
{{--            @endif--}}

{{--            <div class="flex items-center"--}}
{{--                 style={{ $post->isDislikedBy(auth()->user()) ? "color:red" :  "color:grey"}}>--}}
{{--                <button type="submit">--}}
{{--                    <i class="bi bi-hand-thumbs-down"></i>--}}
{{--                </button>--}}

{{--                <span>--}}
{{--                    {{ $post->dislikes_count }}--}}
{{--                </span>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    @endauth--}}
{{--    @guest--}}

{{--        <div class="flex items-center mx-3">--}}
{{--            <button type="button">--}}
{{--                <i class="bi bi-hand-thumbs-up"></i>--}}
{{--            </button>--}}

{{--            <span>--}}
{{--                    {{ $post->likes_count }}--}}
{{--                </span>--}}
{{--        </div>--}}

{{--        <div class="flex items-center">--}}
{{--            <button type="button">--}}
{{--                <i class="bi bi-hand-thumbs-down"></i>--}}
{{--            </button>--}}

{{--            <span>--}}
{{--                    {{ $post->dislikes_count }}--}}
{{--                </span>--}}
{{--        </div>--}}

{{--    @endguest--}}
{{--</div>--}}


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
