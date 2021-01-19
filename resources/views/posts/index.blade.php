<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" xmlns="http://www.w3.org/1999/html">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

<div class="container">
    @foreach($posts as $post)
        <ul class="list-group">
            <li class="list-group-item">
                <a href="{{ route('posts.show', $post) }}">
                    {{ $post->title }}
                </a> by {{ $post->user->name }}

                <x-like-buttons :post="$post"/>

                <x-crud-buttons :post="$post"/>
            </li>
        </ul>

    @endforeach
{{--Pagination links--}}
{{--        {{ $posts->links() }}--}}
</div>
