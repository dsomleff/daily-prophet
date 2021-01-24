<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCommentRequest $request
     * @return mixed
     */
    public function store(StoreCommentRequest $request)
    {
        $request->validated();

        Comment::create([
            'user_id' => auth()->id(),
            'post_id' => request('post_id'),
            'body' => request('body')
        ]);

        return back()->with('flash', 'Your comment has been left!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Comment $comment
     */
    public function update(Comment $comment)
    {
        $comment->update(request(['body']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Comment $comment
     * @return mixed
     * @throws Exception
     */
    public function destroy(Comment $comment)
    {
        $this->authorize('deleteComment', $comment);
        $comment->delete();

        if (request()->expectsJson()) {
            return response(['status' => 'Comment deleted']);
        }

        return back()->with('flash', 'Your comment has been deleted!');
    }
}
