<?php

namespace App\Http\Middleware;

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
        $users = \App\Models\User::All();
        $player = $users->where('_id', $request['userId'])->first();

        if ($player != null) {
            return $next($request);
        }
        else {
            return redirect('/access-denied');
        }
    }
}
