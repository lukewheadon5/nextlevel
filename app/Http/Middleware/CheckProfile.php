<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class CheckProfile
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
        if(auth()->user()->profile()->exists()==true){
        return $next($request);
        } else{
            return view('profile.create')->with('danger','You must first finish creating your profile.');
        }

    }
}
