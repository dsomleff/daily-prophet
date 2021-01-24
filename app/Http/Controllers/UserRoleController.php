<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Auth\Access\AuthorizationException;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param User $user
     * @return mixed
     * @throws AuthorizationException
     */
    public function index(User $user)
    {
        $this->authorize('view', $user);

        $users = $user->all();
        $roles = Role::all();

        return view('users.index', compact('users', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param User    $user
     * @return mixed
     */
    public function update(User $user)
    {
        $user->where('id', $user->id)
            ->update(request(['role_id']));

        return redirect(route('users.index'))
            ->with('flash', 'User role has been updated!');
    }
}
