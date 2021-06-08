<?php

namespace App\Http\Middleware;

use Closure;

class Annee
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
        if(session()->has('annee')) {
            return $next($request);
        }else{
            return redirect()->route('annee')->with('warning', "Veuillez choisir une annee d'activité.");
        }
    }
}
