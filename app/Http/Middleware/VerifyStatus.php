<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->status != 'active') {
            return response()->view('auth/verify');
        }
        return $next($request);
    }
}
