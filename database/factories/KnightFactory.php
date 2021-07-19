<?php

namespace Database\Factories;

use App\Models\Knight;
use Illuminate\Database\Eloquent\Factories\Factory;

class KnightFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Knight::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'level' => $this->faker->randomDigit(),
            'pronoun' => $this->faker->randomElement(['he/him', 'she/her', 'they/them']),
            'chivalryPoints' => $this->faker->biasedNumberBetween(1, 20, function($x) { return 1 - sqrt($x); }),
            'strength' => $this->faker->numberBetween(3, 18),
            'dexterity' => $this->faker->numberBetween(3, 18),
            'trainingDexterity' => 0,
            'constitution' => $this->faker->numberBetween(3, 18),
            'maxEndurance' => 0,
            'currentEndurance' => 0,
            'trainingPoints' => 0,
        ];
    }

    public function configure() {
        return $this->aftermaking(function(Knight $knight) {

        })->afterCreating(function(Knight $knight) {
            $knight->maxEndurance = $knight->strength + $knight->constitution;
            $knight->currentEndurance = $this->faker->numberBetween(0, $knight->maxEndurance);
            $knight->save();
        });
    }
}
