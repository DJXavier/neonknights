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
        \App\Models\User::factory(10)->create();
        \App\Models\Game::factory(10)->create();
        \App\Models\Knight::factory(30)->create();

        $users = \App\Models\User::all();

        \App\Models\Game::all()->each(function ($game) use ($users) { 
            $game->users()->attach(
                $users->random(rand(1, 4))->pluck('id')->toArray()
            ); 
        });

        \App\Models\Game::all()->each(function ($game) {
            $gameMaster = $game->users()->get()->first();
            $game->gameMaster = $gameMaster->id;
            
            $inv = $game->invited;
            array_splice($inv, 0, ($game->users()->count()));
            $game->invited = $inv;

            $game->save();
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
                $uGames  = $user->games()->get();
                //Get games with no knight.
                $filteredGames = $uGames->filter(function ($value, $key) use ($user) {
                    //Get the knights in the game.
                    //See if any knight is connected to the current user.
                    $knightsNotIn = $user->knights()->get()->diff($value->knights()->get());
                    //If there isn't, add the game to the list.
                    return $knightsNotIn->count() == $user->knights()->get()->count();
                });
                //If games exist, save to random.
                if ($filteredGames->count() > 0) {
                    $gameToStore = $filteredGames->random(1)->first();
                    $gameToStore->knights()->save($knight);
                };
            });
        });

        \App\Models\Game::all()->each(function ($game) {
            $gameWeeks = \App\Models\Week::factory($game->currentRound)->create();
            $curWeek = 1;
            foreach($gameWeeks as $title => $week) {
                $week->week_no = $curWeek;
                $curWeek++;
            }
            $gameWeeks->each(function ($week) use ($game) {
                $week->game()->associate($game);
                $week->save();

                foreach($game->knights()->get() as $title => $knight) {
                    //$actions = \App\Models\Action::factory(rand(1, 4))->create();
                    $actions = $week->actions()->saveMany(\App\Models\Action::factory(rand(1, 4))->make());

                    switch($actions->count()) {
                        case 1:
                            $actions->first()->type = \App\Models\Action::$questType;
                            break;
                        /*case 2:
                            $actions->first()->type = Action::$poemType;
                            $actions = $actions->reversed();
                            $actions->first()->type = rand(1, 6);
                            break;
                        case 3:
                            $actions->each(function ($action) {
                                $action->type = rand(1, 6);
                            });
                            break; */
                    }
                    //$week->actions()->save();
                }
            });
        });
    }
}
