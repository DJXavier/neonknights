<?php

namespace Database\Factories;

use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;

class GameFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Game::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'type' => $this->faker->randomElement(array('Adventure', 'Campaign')),
            'noPlayers' => $this->faker->numberBetween(4, 12),
            'currentRound' => $this->faker->numberBetween(1, 4),
            'resetDate' => 'Thursday',
        ];
    }

    public function configure() {
        $generator = $this->faker;

        return $this->aftermaking(function(Game $game) {

        })->afterCreating(function(Game $game) use ($generator) {
            $invited = [];

            for ($i = 0; $i < $game->noPlayers; $i++) {
                array_push($invited, $generator->unique()->safeEmail());
            }

            $game->invited = $invited;
            $game->save();
        });
    }
}
