<?php

namespace Database\Factories;

use App\Models\Noblebot;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoblebotFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Noblebot::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'level' => $this->faker->numberBetween(1, 6),
            'gender' => $this->faker->numberBetween(1, 3),
            'genderFluid' => $this->faker->randomElement([true, false]),
        ];
    }
}
