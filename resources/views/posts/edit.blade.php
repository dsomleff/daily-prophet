@extends('layouts.app')
@section('title', $post->title . ' | Edit Post')

@section('content')
    @can('update', $post)
    <div class="container mt-2">
        <h1 class="h1 text-center text-info">
            Update post
        </h1>

        <form method="POST" action="{{ route('posts.update', $post) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="postTitle">Title</label>
                <input
                class="form-control form-control-lg @error('title') border border-danger @enderror"
                id="postTitle"
                type="text"
                name="title"
                value="{{ $post->title }}">

                @error('title')
                    <div class="text-danger">
                        {{ $errors->first('title') }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="postBody">Text</label>
                <textarea
                class="form-control @error('body') border border-danger @enderror"
                id="postBody"
                rows="10"
                name="body"
                >{{ $post->body }}</textarea>

                @error('body')
                    <div class="text-danger">
                        {{ $errors->first('body') }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <a href="{{ route('posts.index') }}">
                    <button type="button" class="btn btn-outline-info mt-2 mb-2">
                        Back to all posts
                    </button>
                </a>
                <button type="submit" class="btn btn-info mt-2 mb-2">Submit</button>
            </div>
        </form>
    </div>
    @endcan
@endsection

