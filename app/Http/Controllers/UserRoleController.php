<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return mixed
     */
    public function index()
    {
        $users = User::all();
        $roles = Role::all();

        return view('users.index', compact('users', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param User    $user
     * @param Request $request
     * @return mixed
     */
    public function update(User $user, Request $request)
    {
//        $this->authorize('update', $post);

        $user->where('id', $user->id)
            ->update(request(['role_id']));

        return redirect(route('users.index'));
    }

//    /**
//     * Display the specified resource.
//     *
//     * @param User $user
//     * @return mixed
//     */
//    public function show(User $user)
//    {
//        return view('profile.show', compact('user'));
////        return view('profile.update-profile-information-form', compact('user'));
//    }


}
