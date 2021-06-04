<?php

namespace Database\Factories;

use App\Models\Roll;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RollFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Roll::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = User::all()->pluck('id')->toArray();
        $dice1 = $this->faker->numberBetween($min = 1, $max = 6);
        $dice2 = $this->faker->numberBetween($min = 1, $max = 6);
        if ($dice1 + $dice2 == 7) {
            $victory = 1;
        } else {
            $victory = 0;
        }
        return [
            'dice1' => $dice1,
            'dice2' => $dice2,
            'victory' => $victory,
            'userId' => $this->faker->randomElement($users),
        ];
    }
}
