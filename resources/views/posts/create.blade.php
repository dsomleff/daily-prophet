
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <div class="container">
        <h1>Create a Post</h1>
        <form method="POST" action="{{ route('posts.store') }}">
            @csrf
            <div class="form-group">
                <label for="postTitle">Post Title</label>
                <input
                    class="form-control form-control-lg @error('title') border border-danger @enderror"
                    type="text"
                    name="title"
                    value="{{ old('title') }}"
                >
                @error('title')
                    <div class="text-danger">
                        {{ $errors->first('title') }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="postContext">Post Context</label>
                <textarea
                    class="form-control @error('title') border border-danger @enderror"
                    id="exampleFormControlTextarea1"
                    rows="3"
                    name="context"
                >
                    {{ old('context') }}
                </textarea>

                @error('context')
                    <div class="text-danger">
                        {{ $errors->first('context') }}
                    </div>
                @enderror
            </div>

            <div class="form-group form-check">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
