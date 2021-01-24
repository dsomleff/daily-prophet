@extends('layouts.app')

@section('content')

    @include('partials.block')

    <div class="container">
        <div class="row">
            <div class="col-md-16 blog-main">
                <h3 class="pb-3 mb-4 h1 font-italic border-bottom">
                    Latest posts
                </h3>

                <!-- Posts -->
                @forelse($posts as $post)
                    <div class="blog-post mb-5">
                        <a href="{{ route('posts.show', $post) }}">
                            <h2 class="blog-post-title h2">{{ $post->title }}</h2>
                        </a>
                        <p class="blog-post-meta h6">
                            {{ $post->created_at->diffForHumans() }}  by
                            <small class="text-muted">
                                <a href="{{ route('users.posts', $post->user) }}">{{ $post->user->name }}</a>
                            </small>
                        </p>
                        <p class="h5">
                            {{ Str::limit($post->body, 500) }}
                        </p>

                        @include('partials.likes')


                    </div>
                @empty
                    <div class="blog-post mb-5">
                        <h3 class="pb-3 font-italic border-bottom">
                            Nothing was found.
                        </h3>
                    </div>
                @endforelse

                <div class="mb-5">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
