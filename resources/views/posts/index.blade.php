<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" xmlns="http://www.w3.org/1999/html">

<div class="container" id="app">
    @foreach($posts as $post)
        <ul class="list-group">
            <li class="list-group-item">
                <a href="{{ route('posts.show', $post) }}">
                    {{ $post->title }}
                </a> by {{ $post->user->name }}

                <x-like-buttons :post="$post"/>

                <x-post-crud-buttons :post="$post"/>
            </li>
        </ul>

    @endforeach

    <flash message="{{ session('flash') }}"></flash>
{{--Pagination links--}}
{{--        {{ $posts->links() }}--}}
</div>

<script src="{{ mix('js/app.js') }}"></script>
