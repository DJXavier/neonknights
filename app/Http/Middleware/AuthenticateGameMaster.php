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
        if ($request->userId == $request->gameMasterId) {
            return $next($request);
        }
        abort(403);
    }
}
