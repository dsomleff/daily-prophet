<?php

namespace App\Http\Controllers;

use App\Models\Post;

class DislikeController extends Controller
{
    /**
     * Store dislike in storage.
     *
     * @param Post $post
     */
    public function store(Post $post)
    {
        $post->dislike(auth()->user());
    }

    /**
     * Remove dislike.
     *
     * @param Post $post
     * @return mixed
     */
    public function destroy(Post $post)
    {
        return $post->reverse(auth()->user());
    }
}
