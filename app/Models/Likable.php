<?php


namespace App\Models;

trait Likable
{

    /**
     * Relationship
     *
     * @return mixed
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    /**
     * Store like.
     *
     * @param null $user
     * @param bool $liked
     * @return void
     */
    public function like($user = null, $liked = true)
    {
        // updateOrCreate did work this time, so I replace it with next:
        $exist = Like::where('user_id', '=', $user ? $user->id : auth()->id())
            ->where( 'post_id', '=', $this->id)
            ->first();

        if (is_null($exist)) {
            $this->likes()->create([
                'user_id' => $user ? $user->id : auth()->id(),
                'post_id' => $this->id,
                'liked' => $liked
            ]);
        } else {
            Like::where('user_id', '=', $user ? $user->id : auth()->id())
                ->where( 'post_id', '=', $this->id)
                ->update(['liked' => $liked]);
        }
    }

    /**
     * Store dislike
     *
     * @param null $user
     * @return void
     */
    public function dislike($user = null)
    {
        return $this->like($user, false);
    }

    /**
     * Display User own likes
     *
     * @param User $user
     * @return bool
     */
    public function isLikedBy(User $user): bool
    {
        return (bool) $user->likes
            ->where('post_id', $this->id)
            ->where('liked', true)
            ->count();
    }

    /**
     * Display User own dislike
     *
     * @param User $user
     * @return bool
     */
    public function isDislikedBy(User $user): bool
    {
        return (bool) $user->likes
            ->where('post_id', $this->id)
            ->where('liked', false)
            ->count();
    }

    /**
     * Delete existed like/dislike
     *
     * @param null $user
     * @return mixed
     */
    public function unlike($user = null)
    {
        return $user->likes->where('user_id', $user->id ?? auth()->id())->first()->delete();
    }
}
