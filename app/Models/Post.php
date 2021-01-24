<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use Likeable;

    /**
     * @var string[]
     */
    protected $fillable = ['user_id', 'title' , 'body'];

    /**
     * @var string[]
     */
    protected $appends = ['isLiked', 'isDisliked'];

    /**
     * Relationship
     *
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship
     *
     * @return mixed
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Retrieve likes
     *
     * @return mixed
     */
    public function likes()
    {
        return $this->hasMany(Like::class)->where('liked', true);
    }

    /**
     * Retrieve dislikes
     *
     * @return mixed
     */
    public function dislikes()
    {
        return $this->hasMany(Like::class)->where('liked', false);
    }
}
