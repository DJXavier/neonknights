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
    public function update(Request $request,$id)
    {
        $questSolved = false;
        $partySolved = false;
        $trainSolved = false;
        $slackOffSolved = false;
        $poemSolved = false;
        $flirtSolved = false;
        $joustSolved = false;
        $slotTotal = 0;
        if($request->questButton == 'chosen'){
            $slotTotal += 3;
        }
        if($request->partyButton =='chosen'){
            $slotTotal += 1;
        }
        if($request->trainButton =='chosen'){
            $slotTotal += 1;
        }
        if($request->slackOffButton =='chosen'){
            $slotTotal += 1;
        }
        if($request->poemButton =='chosen'){
            $slotTotal += 2;
        }
        if($request->flirtButton =='chosen'){
            $slotTotal += 1;
        }
        if($request->joustButton =='chosen'){
            $slotTotal += 1;
        }

        if( $slotTotal >=0 && $slotTotal <= 3){
            
       

            
            //$game = Auth::user()->games()->where('user_ids', Auth::user()->_id)->get();

            $game = \App\Models\Game::FindOrFail(session('id'));
            //can not find the weeks collection under auth()->user()->games() with specified game id for some reason
            //so, instead, I use   \App\Models\Week;
            // :)
            $currentWeek = \App\Models\Week::where('game_id', session('id'))->where('week_no',$game->currentRound)->first();

            if($currentWeek === null){
                //which means we not found the week for the game
                //then create a new week for the game
                $currentWeek = new \App\Models\Week;
                $currentWeek->quest = "";
                $currentWeek->week_no= $game->currentRound;
                $currentWeek->game_id= session('id');
                $currentWeek->actions = array();
               

                //necessary to set a solved flag for each request,
                // to record which has been solved and pused in as an object
                
                for( $i = 0; $i < $slotTotal; $i++){
                    //edit each action object information here
                    //if user choose to play 3 actions which cost 1 slot each
                    //we need to create an action object for each 
                    if($request->questButton=='chosen' && $questSolved == false){
                        $actionObject = new \App\Models\Action;            
                        $actionObject->quest_code = $request['questButton'];

                        if($request['joustAcceptButton']=='yes'){
                            $actionObject->reject = false;
                        }
                        else if($request['joustAcceptButton']=='no'){
                            $actionObject->reject = true;
                        }

                        $actionObject->type = 6;
                        //push in actions object as array form into array.
                        $questSolved = true;
                        $currentWeek->actions = $currentWeek->actions->push($actionObject->toArray())->toArray();
                    }
                    else if($request->partyButton=='chosen' && $partySolved == false){
                        $actionObject = new \App\Models\Action;            
                        $actionObject->quest_code =null;
                        if($request['joustAcceptButton']=='yes'){
                            $actionObject->reject = false;
                        }
                        else if($request['joustAcceptButton']=='no'){
                            $actionObject->reject = true;
                        }
                        $actionObject->type = 4;
                        //push in actions object as array form into array.
                        $partySolved = true;
                        $currentWeek->actions = $currentWeek->actions->push($actionObject->toArray())->toArray();
                    }
                    else if($request->trainButton=='chosen' && $trainSolved == false){
                        $actionObject = new \App\Models\Action;            
                        $actionObject->quest_code = null;
                        if($request['joustAcceptButton']=='yes'){
                            $actionObject->reject = false;
                        }
                        else if($request['joustAcceptButton']=='no'){
                            $actionObject->reject = true;
                        }
                        $actionObject->type = 2;
                        //push in actions object as array form into array.
                        $trainSolved = true;
                        $currentWeek->actions = $currentWeek->actions->push($actionObject->toArray())->toArray();
                    }
                    else if($request->slackOffButton=='chosen' && $slackOffSolved == false){
                        $actionObject = new \App\Models\Action;            
                        $actionObject->quest_code = null;
                        if($request['joustAcceptButton']=='yes'){
                            $actionObject->reject = false;
                        }
                        else if($request['joustAcceptButton']=='no'){
                            $actionObject->reject = true;
                        }
                        $actionObject->type = 1;
                        //push in actions object as array form into array.
                        $slackOffSolved = true;
                        $currentWeek->actions = $currentWeek->actions->push($actionObject->toArray())->toArray();
                    }
                    else if($request->poemButton=='chosen' && $poemSolved == false){
                        $actionObject = new \App\Models\Action;            
                        $actionObject->quest_code = null;
                        if($request['joustAcceptButton']=='yes'){
                            $actionObject->reject = false;
                        }
                        else if($request['joustAcceptButton']=='no'){
                            $actionObject->reject = true;
                        }
                        $actionObject->type = 7;
                        //push in actions object as array form into array.
                        $poemSolved = true;
                        $currentWeek->actions = $currentWeek->actions->push($actionObject->toArray())->toArray();
                    }
                    else if($request->flirtButton=='chosen' && $flirtSolved == false){
                        $actionObject = new \App\Models\Action;            
                        $actionObject->quest_code = null;
                        if($request['joustAcceptButton']=='yes'){
                            $actionObject->reject = false;
                        }
                        else if($request['joustAcceptButton']=='no'){
                            $actionObject->reject = true;
                        }
                        $actionObject->type = 3;
                        //push in actions object as array form into array.
                        $flirtSolved = true;
                        $currentWeek->actions = $currentWeek->actions->push($actionObject->toArray())->toArray();
                    }
                    else if($request->joustButton=='chosen' && $joustSolved == false){
                        $actionObject = new \App\Models\Action;            
                        $actionObject->quest_code = null;
                        if($request['joustAcceptButton']=='yes'){
                            $actionObject->reject = false;
                        }
                        else if($request['joustAcceptButton']=='no'){
                            $actionObject->reject = true;
                        }
                        $actionObject->type = 5;
                        //push in actions object as array form into array.
                        $joustSolved = true;
                        $currentWeek->actions = $currentWeek->actions->push($actionObject->toArray())->toArray();
                    }

                }
                
                //...
                
                $currentWeek->save();
            }
            
            else{
                //this means we found the week for the game, only need to update action information for the week
                //change below and...input action object into array below
                for( $i = 0; $i < $slotTotal; $i++){
                    //edit each action object information here
                    //if user choose to play 3 actions which cost 1 slot each
                    //we need to create an action object for each 
                    if($request->questButton=='chosen' && $questSolved == false){
                        $actionObject = new \App\Models\Action;            
                        $actionObject->quest_code = $request['questButton'];

                        if($request['joustAcceptButton']=='yes'){
                            $actionObject->reject = false;
                        }
                        else if($request['joustAcceptButton']=='no'){
                            $actionObject->reject = true;
                        }

                        $actionObject->type = 6;
                        //push in actions object as array form into array.
                        $questSolved = true;
                        $currentWeek->actions = $currentWeek->actions->push($actionObject->toArray())->toArray();
                    }
                    else if($request->partyButton=='chosen' && $partySolved == false){
                        $actionObject = new \App\Models\Action;            
                        $actionObject->quest_code =null;
                        if($request['joustAcceptButton']=='yes'){
                            $actionObject->reject = false;
                        }
                        else if($request['joustAcceptButton']=='no'){
                            $actionObject->reject = true;
                        }
                        $actionObject->type = 4;
                        //push in actions object as array form into array.
                        $partySolved = true;
                        $currentWeek->actions = $currentWeek->actions->push($actionObject->toArray())->toArray();
                    }
                    else if($request->trainButton=='chosen' && $trainSolved == false){
                        $actionObject = new \App\Models\Action;            
                        $actionObject->quest_code = null;
                        if($request['joustAcceptButton']=='yes'){
                            $actionObject->reject = false;
                        }
                        else if($request['joustAcceptButton']=='no'){
                            $actionObject->reject = true;
                        }
                        $actionObject->type = 2;
                        //push in actions object as array form into array.
                        $trainSolved = true;
                        $currentWeek->actions = $currentWeek->actions->push($actionObject->toArray())->toArray();
                    }
                    else if($request->slackOffButton=='chosen' && $slackOffSolved == false){
                        $actionObject = new \App\Models\Action;            
                        $actionObject->quest_code = null;
                        if($request['joustAcceptButton']=='yes'){
                            $actionObject->reject = false;
                        }
                        else if($request['joustAcceptButton']=='no'){
                            $actionObject->reject = true;
                        }
                        $actionObject->type = 1;
                        //push in actions object as array form into array.
                        $slackOffSolved = true;
                        $currentWeek->actions = $currentWeek->actions->push($actionObject->toArray())->toArray();
                    }
                    else if($request->poemButton=='chosen' && $poemSolved == false){
                        $actionObject = new \App\Models\Action;            
                        $actionObject->quest_code = null;
                        if($request['joustAcceptButton']=='yes'){
                            $actionObject->reject = false;
                        }
                        else if($request['joustAcceptButton']=='no'){
                            $actionObject->reject = true;
                        }
                        $actionObject->type = 7;
                        //push in actions object as array form into array.
                        $poemSolved = true;
                        $currentWeek->actions = $currentWeek->actions->push($actionObject->toArray())->toArray();
                    }
                    else if($request->flirtButton=='chosen' && $flirtSolved == false){
                        $actionObject = new \App\Models\Action;            
                        $actionObject->quest_code = null;
                        if($request['joustAcceptButton']=='yes'){
                            $actionObject->reject = false;
                        }
                        else if($request['joustAcceptButton']=='no'){
                            $actionObject->reject = true;
                        }
                        $actionObject->type = 3;
                        //push in actions object as array form into array.
                        $flirtSolved = true;
                        $currentWeek->actions = $currentWeek->actions->push($actionObject->toArray())->toArray();
                    }
                    else if($request->joustButton=='chosen' && $joustSolved == false){
                        $actionObject = new \App\Models\Action;            
                        $actionObject->quest_code = null;
                        if($request['joustAcceptButton']=='yes'){
                            $actionObject->reject = false;
                        }
                        else if($request['joustAcceptButton']=='no'){
                            $actionObject->reject = true;
                        }
                        $actionObject->type = 5;
                        //push in actions object as array form into array.
                        $joustSolved = true;
                        $currentWeek->actions = $currentWeek->actions->push($actionObject->toArray())->toArray();
                    }

                }

                $currentWeek->save();
            }
        
           
        
            return redirect('/submittedweeklyaction');

        }else{
            return redirect('/weeklyaction');
        }
            
        //return 1;
    }
}
