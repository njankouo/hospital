<?php

namespace App\Http\Middleware;


use auth;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class admin
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
       if(Gate::allows('admin')){
        return $next($request);
       }
       return redirect()->route('home');
    }
    /**allows si ca renvoie true la requete passe */
}
