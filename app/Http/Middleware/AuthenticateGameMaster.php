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
        if (!\Auth::user()) {
            $accessDeniedMessage = "You are not logged into the website.";
            return redirect('/access-denied')->with('accessDeniedMessage', $accessDeniedMessage);
        }

        $userId = \Auth::user()->id;

        if ($request->gameId)
        {
            if ($userId == \App\Models\Game::Find($request->gameId)->gameMaster) {
                return $next($request);
            }
            else {
                $accessDeniedMessage = "Only the game master can manage the group.";
                return redirect('/access-denied')->with('accessDeniedMessage', $accessDeniedMessage);
            }
        }
        else {
            return $next($request);
        }
    }
}
