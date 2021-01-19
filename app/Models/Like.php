<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $guarded = [];

    /**
     * Relationship.
     *
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
