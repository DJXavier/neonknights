<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'testAcc',
            'email' => 'test@test.com',
        ]);

        \App\Models\User::factory(10)->create();
        \App\Models\Game::factory(10)->create();
        \App\Models\Knight::factory(30)->create();

        $games = \App\Models\Game::all();

        \App\Models\User::all()->each(function ($user) use ($games) { 
            $user->games()->attach(
                $games->random(rand(1, 3))->pluck('id')->toArray()
            ); 
        });

        \App\Models\User::all()->each(function ($user) {
            $knights = \App\Models\Knight::all();
            $filteredKnights = $knights->filter(function ($value, $key) {
                return $value->user_id == null;
            });

            if ($filteredKnights->count() > 0) {
                $user->knights()->saveMany(
                    //If number of knights is less than three, change random selection values.
                    $filteredKnights->random(rand(
                        ($filteredKnights->count() < 3) ? 1 : 3,
                        ($filteredKnights->count() < 6) ? $filteredKnights->count() : 6))
                );
            };

            $user->knights()->each(function ($knight) use ($user) {
                $uGames  = $user->games;
                //Get games with no knight.
                $filteredGames = $uGames->filter(function ($value, $key) use ($user) {
                    //Get the knights in the game.
                    //See if any knight is connected to the current user.
                    $knightsNotIn = $user->knights->diff($value->knights()->get());
                    //If there isn't, add the game to the list.
                    return $knightsNotIn->count() == $user->knights->count();
                });
                //If games exist, save to random.
                if ($filteredGames->count() > 0) {
                    $gameToStore = $filteredGames->random(1)->first();
                    $gameToStore->knights()->save($knight);
                };
            });
        });
    }
}
