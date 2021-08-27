<?php

namespace App\Http\Controllers;


use App\Models\Game;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class SelectGroupController extends Controller
{
    //transfer the game id as a session for weeklyaction to use
    public function next(Request $request)
    {

        session()->remove('id');
        session()->put('id', $request['thisId']);

        return redirect()->route('weeklyaction.newWeek');
    }

}
