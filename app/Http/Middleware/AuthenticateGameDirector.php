<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticateGameDirector
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

        $userRole = \Auth::user()->role;
        $role = "director";

        if ($userRole == $role) {
            return $next($request);
        }
        else {
            $accessDeniedMessage = "Only game directors can access this page.";
            return redirect('/access-denied')->with('accessDeniedMessage', $accessDeniedMessage);
        }
    }
}
