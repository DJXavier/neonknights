<?php

namespace Database\Factories;

use App\Models\GameRound;
use Illuminate\Database\Eloquent\Factories\Factory;

class GameRoundFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GameRound::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'gameWeek' => $this->faker->numberBetween(1, 5),
            'weekQuest' => null,
        ];
    }
}
