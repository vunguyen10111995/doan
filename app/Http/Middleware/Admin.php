<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Models\User;

class Admin
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
        if(!Auth::check() || Auth::user()->level !=0 ) {
            return redirect('/');
        }

        return $next($request);
    }
}
