@extends('layouts.app')
@section('title', 'Create New Post')

@section('content')
    @can('create', App\Models\Post::class)
    <div class="container">
        <h1 class="h1 text-center text-primary">
            Create new post
        </h1>

        <form method="POST" action="{{ route('posts.store') }}">
            @csrf
            <div class="form-group">
                <label for="postTitle">Title</label>
                <input
                class="form-control form-control-lg @error('title') border border-danger @enderror"
                id="postTitle"
                type="text"
                name="title"
                value="{{ old('title') }}"
                required
            >

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
                rows="3"
                name="body"
                required
                >{{ old('body') }}</textarea>

                @error('body')
                    <div class="text-danger">
                        {{ $errors->first('body') }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <a href="{{ route('posts.index') }}">
                    <button type="button" class="btn btn-outline-primary mt-2 mb-2">
                        Back to all posts
                    </button>
                </a>
                <button type="submit" class="btn btn-primary mt-2 mb-2">Submit</button>
            </div>
        </form>
    </div>
    @endcan
@endsection
