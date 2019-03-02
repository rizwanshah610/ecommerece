<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class AdminAthunticate
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

        if (Auth::user()->role->name == 'customer'){
            return redirect('/home')->with('message','You have not access of this page');
        }
        return $next($request);
    }
}
