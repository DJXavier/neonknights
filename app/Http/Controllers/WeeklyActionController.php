<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Game;
use App\Models\Week;
use App\Models\Action;

class WeeklyActionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $game = \App\Models\Game::FindOrFail($id);
        //can not find the weeks collection under auth()->user()->games() with specified game id for some reason
        //so, instead, I use   \App\Models\Week;
        // :)
        $currentWeek = \App\Models\Week::where('game_id', $id)->where('week_no',$game->currentRound)->first();
            
        if($currentWeek === null){
            //which means we not found the week for the game
            //then create a new week for the game
            $currentWeek = new \App\Models\Week;
            $currentWeek->quest = "";
            $currentWeek->week_no= $game->currentRound;
            $currentWeek->game_id= $id;
            //necessary to set a solved flag for each request,
            // to record which has been solved and pused in as an object
        }

        $knight = $game->knights()->where('user_id', auth()->user()->id)->get()->first();
        
        $takenActions = $currentWeek->actions()->get()->filter(function ($action, $key) use ($knight) {
            return $action->knight()->get()->id == $knight->id;
        });

        $takenActions->each(function ($action, $key) use ($currentWeek) {
            $currentWeek->actions()->dissociate($action);
        });
        $currentWeek->save();

        $actionPrefixes = [
            'one',
            'two',
            'three'
        ];

        //this means we found the week for the game, only need to update action information for the week
        //change below and...input action object into array below
        for( $i = 0; $i < 3; $i++){
            //edit each action object information here
            //if user choose to play 3 actions which cost 1 slot each
            //we need to create an action object for each 
            $actionPre = $actionPrefixes[$i];
            $actionValues = [
                'type' => $request[($actionPre . "-type")],
                'length' => $request[($actionPre . "-length")],
                'joust' => $request[($actionPre . "-joust-accept")],
                'target' => $request[($actionPre . "-target")],
                'entry' => $request[($actionPre . "-entry")],
                'time' => $request[($actionPre . "-time")],
            ];
            
            if($actionValues["type"] != null){
                
                $actionObject = $currentWeek->actions()->create();  
                $actionObject->knight()->associate($knight);
                $actionObject->quest_code = null;
                $actionObject->reject = $actionValues["joust"];
                $actionObject->save();

                switch ($actionValues["type"]) {
                    case 'quest':
                        $actionObject->type = 6;
                        break;
                    case 'party':
                        $actionObject->type = 4;
                        break;
                    case 'train':
                        $actionObject->type = 2;
                        break;
                    case 'slackOff':
                        $actionObject->type = 1;
                        break;
                    case 'poem':
                        $actionObject->type = 7;
                        $actionObject->poem = $actionValues["entry"];
                        break;
                    case 'flirt':
                        $actionObject->type = 3;
                        $actionObject->noblebot()
                            ->associate(\App\Models\Noblebot::Find($actionValues["target"]));
                        break;
                    case 'joust':
                        $actionObject->type = 5;
                        $actionObject->targetKnight()
                            ->assosciate(\App\Models\Knights::Find($actionValues["target"]));
                        break;
                }
                $actionObject->save();
                $currentWeek->save();

            }

        }
        $currentWeek->save();

        return redirect('/submittedweeklyaction');
    }
}
