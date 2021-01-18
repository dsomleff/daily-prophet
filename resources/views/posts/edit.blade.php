<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

@can('update', $post)
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

                @error('title')
                <div class="text-danger">
                    {{ $errors->first('title') }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="postContext">Post Body</label>
                <textarea
                    class="form-control"
                    id="exampleFormControlTextarea1"
                    rows="3"
                    name="body"
                >{{$post->body}}
                    </textarea>

                @error('body')
                <div class="text-danger">
                    {{ $errors->first('body') }}
                </div>
                @enderror
            </div>

            <div class="form-group form-check">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <a href="{{ route('posts.index') }}">
            <button type="button" class="btn btn-link">Back</button>
        </a>
    </div>
@endcan
