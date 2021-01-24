<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

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
            'user_id' => $this->faker->randomElement($usersIds),
            'post_id' => $this->faker->randomElement($postsIds),
            'body' => $this->faker->text
        ];
    }
}
