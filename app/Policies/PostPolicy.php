<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    const ADMIN = 'admin';
    const CONTRIBUTOR = 'contributor';

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $this->create($user);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Post $post
     * @return mixed
     */
    public function view(User $user, Post $post)
    {
//        return $post->user->is($user);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     *
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->role->name == self::CONTRIBUTOR || $user->role->name == self::ADMIN;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User $user
     * @param Post  $post
     * @return bool
     */
    public function update(User $user, Post $post): bool
    {
        return $post->user->is($user) || $user->role->name == self::ADMIN;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User $user
     * @param Post  $post
     * @return bool
     */
    public function delete(User $user, Post $post): bool
    {
        return $post->user->is($user) || $user->role->name == self::ADMIN;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  User $user
     * @param Post  $post
     * @return mixed
     */
    public function restore(User $user, Post $post)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User $user
     * @param Post  $post
     * @return mixed
     */
    public function forceDelete(User $user, Post $post)
    {
        //
    }
}
