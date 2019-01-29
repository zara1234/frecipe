<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->guest() || Auth::user()->user_group !== 1) {
            return redirect()->route("login")->with("You have to be logged in to view this.");
        } else {
            return $next($request);
        }
    }
}
