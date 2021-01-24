@extends('layouts.app')
@section('title', $post->title)

@section('content')
    <div class="container mt-2">
        <!-- Post -->
        <h1 class="h1 text-center text-info">
            {{ $post->title }}
        </h1>
        <p class="h3 text-center">
            Posted by
            <a href="{{ route('users.posts', $post->user) }}">
                {{ $post->user->name }}
            </a>
        </p>
        <p class="lead">
            {{ $post->body }}
        </p>

        @include('partials.post-ud-buttons')
        @include('partials.likes')
        @include('partials.comments')
        @include('partials.comments-form')

        <p>
            <a href="{{ route('posts.index') }}">
                <button type="button" class="btn btn-outline-info mt-2 mb-2">
                    Back to all posts
                </button>
            </a>
        </p>
    </div>
@endsection


