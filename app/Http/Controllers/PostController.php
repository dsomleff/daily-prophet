<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\User;
use Exception;
use App\Models\Post;
use Illuminate\Auth\Access\AuthorizationException;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return mixed
     */
    public function index()
    {
        if (request()->route()->getName() == 'user.posts') {
            $posts = auth()->user()->posts();
            return view('posts.index', compact('posts'));
        }
        // or Post::paginate(10);
        $posts = Post::latest()->paginate(5);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     * @return mixed
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', Post::class);
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Post             $post
     * @param StorePostRequest $request
     * @return mixed
     * @throws AuthorizationException
     */
    public function store(Post $post, StorePostRequest $request)
    {
        $this->authorize('create', Post::class);
        $request->validated();

        Post::create([
            'user_id' => auth()->id(),
            'title' => request('title'),
            'body' => request('body')
        ]);

        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return mixed
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     *
     * @return mixed
     * @throws AuthorizationException
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Post        $post
     * @return mixed
     * @throws AuthorizationException
     */
    public function update(Post $post, StorePostRequest $request)
    {
        $this->authorize('update', $post);

        $post->update($request->validated());

        return redirect(route('posts.show', $post));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     *
     * @return mixed
     * @throws Exception
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete($post);

        return redirect(route('posts.index'));
    }
}
