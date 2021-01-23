@extends('layouts.app')

@section('content')
    <div class="container" id="app">
        <!-- Post -->
        <h1 class="h1 text-center text-primary">
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

        <a href="{{ route('posts.index') }}">
            <button type="button" class="btn btn-outline-primary mt-2 mb-2">
                Back to all posts
            </button>
        </a>

        <flash message="{{ session('flash') }}"></flash>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
@endsection


