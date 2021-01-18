<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<div class="container">
    <h1>Update Post</h1>
    <form method="POST" action="{{ route('posts.update', $post) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="postTitle">Post Title</label>
            <input
                class="form-control form-control-lg"
                type="text"
                name="title"
                value="{{$post->title}}"
            >

        </div>

        <div class="form-group">
            <label for="postContext">Post Context</label>
            <textarea
                class="form-control"
                id="exampleFormControlTextarea1"
                rows="3"
                name="context"
            >{{$post->context}}
                </textarea>
        </div>

        <div class="form-group form-check">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
