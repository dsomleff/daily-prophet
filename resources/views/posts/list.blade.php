@extends('layouts.app')
@section('title', $user->name . ' | Personal Area')

@section('content')

    <div class="container mt-2">
        <div class="row">
            <div class="col-md-16 blog-main">
                <h3 class="pb-3 mb-4 h1 font-italic">
                    {{ $user->name }}
                    <small class="text-info">
                        ({{ $user->role->name }}) joined Daily Prophet {{ $user->created_at->diffForHumans()}}
                    </small>
                </h3>

                <!-- Posts -->
                <h3 class="h2 text-info">Posts</h3>
                @forelse($user->posts() as $post)
                    <div class="blog-post mb-3">
                        <a href="{{ route('posts.show', $post) }}">
                            <h2 class="blog-post-title h2">
                                {{ $post->title }}
                            </h2>
                        </a>
                        <p class="blog-post-meta h6">
                            {{ $post->created_at->diffForHumans() }}  by
                            <small class="text-muted">
                                {{ $post->user->name }}
                            </small>
                        </p>
                        <p>
                            {{ $post->body }}
                        </p>

                        @include('partials.post-ud-buttons')

                    </div>
                @empty
                    <div class="blog-post mb-5">
                        <h3 class="pb-3 font-italic border-bottom">
                            Nothing was found.
                        </h3>
                    </div>
                @endforelse

                <!-- Comments -->
                <h3 class="h2 text-info">Comments</h3>
                @forelse($user->comments() as $comment)
                    <div class="blog-post mb-3">
                            <h2 class="h4">
                                {{ $comment->body }}
                            </h2>
                        <p class="blog-post-meta h6">
                            {{ $comment->created_at->diffForHumans() }} for
                            <a href="{{ route('posts.show', $comment->post_id) }}" class="text-info">
                                {{ $comment->post->title }}
                            </a>
                        </p>

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

