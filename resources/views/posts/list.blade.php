@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-16 blog-main">
                <h3 class="pb-3 mb-4 h1 font-italic border-bottom">
                    {{ $user->name }}
                    <small class="text-muted"> joined Daily Prophet {{ $user->created_at->diffForHumans()
                    }}</small>
                </h3>

                <!-- Posts -->
                <h3 class="h3 text-primary">Posts</h3>
                @forelse($user->posts() as $post)
                    <div class="blog-post mb-5">
                        <a href="{{ route('posts.show', $post) }}">
                            <h2 class="blog-post-title h2">{{ $post->title }}</h2>
                        </a>
                        <p class="blog-post-meta h6">
                            {{ $post->created_at->diffForHumans() }}  by
                            <small class="text-muted">
                                {{ $post->user->name }}
                            </small>
                        </p>
                        <p class="h5">
                            {{ $post->body }}
                        </p>

                        <div class="row">
                            @can('update', $post)
                                <form method="GET" action="{{ route('posts.edit', $post) }}">
                                    <button type="submit" class="btn btn-outline-primary mt-2 mb-2 ml-4 mr-2">Edit</button>
                                </form>
                            @endcan

                            @can('delete', $post)
                                <form method="POST" action="{{ route('posts.destroy', $post) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger mt-2 mb-2">Delete</button>
                                </form>
                            @endcan
                        </div>
                    </div>
                @empty
                    <div class="blog-post mb-5">
                        <h3 class="pb-3 font-italic border-bottom">
                            Nothing was found.
                        </h3>
                    </div>
                @endforelse

                <!-- Comments -->
                <h3 class="h3 text-primary">Comments</h3>
                @forelse($user->comments() as $comment)
                    <div class="blog-post mb-5">
                            <h2 class="blog-post-title h2">
                                {{ $comment->text }}
                            </h2>
                        <p class="blog-post-meta h6">
                            {{ $comment->created_at->diffForHumans() }}
                            <a href="{{ route('posts.show', $comment->post_id) }}">
                                {{ $comment->post->title }}
                            </a>
                        </p>

                        @can('deleteComment', $post ?? '')
                            <form method="POST" action="">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                            </form>
                        @endcan
                    </div>
                @empty
                    <div class="blog-post mb-5">
                        <h3 class="pb-3 font-italic border-bottom">
                            Nothing was found.
                        </h3>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

@endsection

