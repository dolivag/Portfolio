<?php

namespace Database\Factories;

use App\Models\Painting;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class PaintingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Painting::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'author' => $this->faker->optional(0.9, 'Anónimo')->name,
            'name' => $this->faker->sentence($nbWords = 6),
            'shop_id' => $this->faker->randomElement([1, 2, 3, 4, 5]),
            'price' => $this->faker->numberBetween($min = 10, $max = 1000),
            'arrive_shop' => $this->faker->date(),
            'image' => $this->faker->imageUrl(),
        ];
    }
}
