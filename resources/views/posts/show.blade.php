<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<div class="container">
    <h1>{{ $post->title }}</h1>
    <h2>Posted by {{ $post->user->name }}</h2>

    <p>
        {{ $post->body }}
    </p>

    <a href="{{ route('posts.index') }}">
        <button type="button" class="btn btn-link">Back</button>
    </a>
</div>
