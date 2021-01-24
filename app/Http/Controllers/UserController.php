<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;

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
        if ($user->id === Auth::id()) {
            Auth::logout();
            $user->delete();
            return redirect(route('main'))
                ->with('flash', 'Your account has been deleted!');
        }

        $user->delete();
        return back()
            ->with('flash', 'User account has been deleted!');
    }
}
