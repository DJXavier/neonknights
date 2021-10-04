<?php

namespace App\Http\Middleware;//

use Closure;
use Illuminate\Http\Request;

class AuthenticateCharacterCreation
{
    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle ($request, Closure $next)
    {
        $game = \App\Models\Game::Find($request->route('gameId'));
        $user = \Auth::user();
        $accessDeniedMessage = "You must be logged in to join a group.";

        if ($user) {
            return $next($request);
        }
        else {
            return redirect('/access-denied')->with('accessDeniedMessage', $accessDeniedMessage);
        }
    }
}
