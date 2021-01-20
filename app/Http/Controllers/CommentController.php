<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        Comment::create([
            'user_id' => auth()->id(),
            'post_id' => request('post_id'),
            'body' => request('body')
        ]);
        return back()->with('flash', 'Your comment has been left!');
    }

    /**
     * Display the specified resource.
     *
     * @param Comment $comment
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
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

        if (\request()->expectsJson()) {
            return response(['status' => 'Comment deleted']);
        }

        return back();
    }
}
