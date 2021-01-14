<?php

namespace Database\Factories;

use App\Models\Relationship;
use Illuminate\Database\Eloquent\Factories\Factory;

class RelationshipFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Relationship::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userOne =\App\Models\User::inRandomOrder()->first()->id;
        $userTwo = \App\Models\User::inRandomOrder()->first()->id;
        $actionUser = $this->faker->numberBetween(1,2)==1? $userOne:$userTwo;
        return [
            //
            'user_one_id'=>$userOne,
            'user_two_id'=>$userTwo,
            'status'=>$this->faker->numberBetween(0,3),
            'action_user_id'=>$actionUser,
        ];
    }
}
