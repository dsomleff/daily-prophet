<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class LikeController extends Controller
{
    /**
     * Store like in storage.
     *
     * @param Post $post
     * @return RedirectResponse
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
     * @return RedirectResponse
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
     * @return RedirectResponse
     */
    public function destroyLike(Post $post)
    {
        $post->unlike(auth()->user());

        return back();
    }
}
