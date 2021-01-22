<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;

class UserController extends Controller
{
    /**
     * Display all user's posts.
     *
     * @param User $user
     * @return mixed
     */
    public function index(User $user)
    {
        return view('posts.list', ['user' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     *
     * @return mixed
     * @throws Exception
     */
    public function destroy(User $user)
    {
//        $this->authorize('delete', $post);
        $user->delete();

        return redirect(route('main'));
    }
}
