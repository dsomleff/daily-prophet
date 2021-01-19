<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    const ADMIN = 'admin';

    /**
     * Determine whether the user can delete the comment.
     *
     * @param  User  $user
     * @param Comment  $comment
     *
     * @return mixed
     */
    public function deleteComment(User $user, Comment $comment): bool
    {
        return $comment->user->is($user) || $user->role->name == self::ADMIN;
    }
}
