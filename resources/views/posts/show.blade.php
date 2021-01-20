<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<div class="container" id="app">
    <h1 class="display-4">{{ $post->title }}</h1>
    <p class="blockquote-footer">Posted by {{ $post->user->name }}</p>

    <p class="lead">
        {{ $post->body }}
    </p>

    <a href="{{ route('posts.index') }}">
        <button type="button" class="btn btn-link">Back</button>
    </a>

    <div class="container">
        <hr>
    </div>

    <x-comments-section :post="$post"/>
</div>
