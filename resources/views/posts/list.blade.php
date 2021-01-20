@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-16 blog-main">
                <h3 class="pb-3 mb-4 h1 font-italic border-bottom">
                    USRNAME
                    <small class="text-muted"> joined Daily Prophet _______</small>
                </h3>

                <!-- Posts -->
                <h3 class="h3 text-primary">My posts</h3>
                @forelse($posts as $post)
                    <div class="blog-post mb-5">
                        <a href="{{ route('posts.show', $post) }}">
                            <h2 class="blog-post-title h2">{{ $post->title }}</h2>
                        </a>
                        <p class="blog-post-meta h6">
                            {{ $post->created_at->diffForHumans() }}  by 
                            <small class="text-muted">
                                <a href="#">{{ $post->user->name }}</a>
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
                <h3 class="h3 text-primary">My comments</h3>
                <!-- forelse -->
                    <div class="blog-post mb-5">
                            <h2 class="blog-post-title h2">
                                ___jdjfheurhvjkkdsncdnkjsve____
                                <!-- comment text -->
                            </h2>
                        <p class="blog-post-meta h6">
                            ___5 min ago____for____

                            <a href="{{ route('posts.show', $post) }}">
                                ___post_title____
                            </a>

                            <!-- created_at->diffForHumans() -->
                        </p>
                    
                        <!-- can('deleteComment', $post) -->
                            <form method="POST" action="">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                            </form>
                        <!-- endcan -->
                    </div>
                <!-- empty -->
                    <div class="blog-post mb-5">
                        <h3 class="pb-3 font-italic border-bottom">
                            Nothing was found.
                        </h3>
                    </div>
                <!-- endforelse -->
            </div>
        </div>
    </div>

@endsection

