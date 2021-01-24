<?php

namespace Database\Factories;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class LikeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Like::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $usersIds = User::where('role_id', '!=', 1)->pluck('id')->toArray();
        $postsIds = Post::all();

        return [
            'user_id' => $this->faker->unique(true)->randomElement($usersIds),
            'post_id' => $this->faker->unique(true)->randomElement($postsIds),
            'liked' => $this->faker->randomElement([0, 1])
        ];
    }
}
