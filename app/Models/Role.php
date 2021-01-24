<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * Relationship.
     *
     * @return mixed
     */
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
