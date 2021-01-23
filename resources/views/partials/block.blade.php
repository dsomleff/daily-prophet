<!-- Page Header -->
<header class="jumbotron p-3 p-md-5 text-white rounded bg-info">
    @foreach($posts as $post)
        <div class="col-md-6 px-0">
            <h1 class="display-4 font-italic">{{ $post->title }}</h1>
            <p class="lead my-3">{{ $post->body }}</p>
            <p class="lead mb-0">
                <a href="{{ route('posts.show', $post) }}"
                   class="text-white font-weight-bold"
                >
                    Continue reading...
                </a>
            </p>
        </div>
        @break
    @endforeach
</header>
