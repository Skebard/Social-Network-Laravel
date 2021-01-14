<?php

namespace Database\Factories;

use App\Models\SavedPost;
use Illuminate\Database\Eloquent\Factories\Factory;

class SavedPostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SavedPost::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'post_id'=>\App\Models\Post::inRandomOrder()->first()->id,
            'user_id'=>\App\Models\User::inRandomOrder()->first()->id,
        ];
    }
}
