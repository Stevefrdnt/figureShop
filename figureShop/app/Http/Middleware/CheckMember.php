<?php

namespace App\Http\Middleware;

use Closure;

class CheckMember
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
        if ( isEmpty(auth()->user()) || auth()->user()->role != "Member"){
            return view('/');
        }

        return $next($request);
    }
}