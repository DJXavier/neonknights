<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Game;
class WeeklyActionController extends Controller
{
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //As for detailed rules for weekly action, we will calculate user's input 
        //and see if the input is valid for example actions not taking more than three slots in total for current week
        //will implement it later...

        //put here for now, but later will move the session setting for userId to the controller
        //where when the current player hit the button that will direct him to the weeklyaction page
        session()->remove('userId');
        session()->put('userId', Auth::user()->_id);
        
        return 1;
    }
}
