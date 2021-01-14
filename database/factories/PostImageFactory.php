<?php

namespace Database\Factories;

use App\Models\PostImage;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PostImage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'post_id'=>$this->faker->unique()->numberBetween(1,100),
            'position'=> 1,
            'image'=>'images/posts/'.$this->faker->image('public/images/posts', 440, 440, null, false),
        ];
    }
}
