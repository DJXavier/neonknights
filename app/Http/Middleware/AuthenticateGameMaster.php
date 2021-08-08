<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticateGameMaster
{
    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle ($request, Closure $next)
    {
        if ($request->userId == \App\Models\Game::Find($request->gameId)->gameMaster) {
            return $next($request);
        }
        else {
            $accessDeniedMessage = "Only the game master can manage the group.";
            return redirect('/access-denied')->with('accessDeniedMessage', $accessDeniedMessage);
        }
    }
}
