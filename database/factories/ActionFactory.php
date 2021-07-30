<?php

namespace Database\Factories;

use App\Models\Action;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Action::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'actionType' => $this->faker->numberBetween(1, 7),
            'targetKnight' => null,
            'targetBot' => null,
            'quest' => null,
            'questCode' => null,
            'joustReject' => $this->faker->randomElement([true, false]),
        ];
    }
}
