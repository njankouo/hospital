<?php

namespace App\Http\Middleware;


use auth;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class user
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
         if(Gate::allows('utilisateur')){
        return $next($request);
       }
       return redirect()->route('home');

    }
}
