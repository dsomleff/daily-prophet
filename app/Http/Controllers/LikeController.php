<?php

namespace App\Http\Controllers;

use App\Models\Post;

class LikeController extends Controller
{
    /**
     * Store like in storage.
     *
     * @param Post $post
     */
    public function storeLike(Post $post)
    {
        $post->like(auth()->user());

        return back();
    }

    /**
     * Store dislike in storage.
     *
     * @param Post $post
     */
    public function storeDislike(Post $post)
    {
        $post->dislike(auth()->user());
        return back();

    }

    /**
     * Remove like/dislike.
     *
     * @param Post $post
     */
    public function destroy(Post $post)
    {
        $post->unlike(auth()->user());
        return back();

    }
}
