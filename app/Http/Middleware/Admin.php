<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Admin
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
        // if (Auth::check() && Auth::user()->role == 1) {
            // return redirect()->route('superadmin');
        // }
        // elseif (Auth::check() && Auth::user()->role == 5) {
            // return redirect()->route('academy');
        // }
        // elseif (Auth::check() && Auth::user()->role == 6) {
            // return redirect()->route('scout');
        // }
        // elseif (Auth::check() && Auth::user()->role == 4) {
            // return redirect()->route('team');
        // }
        // elseif (Auth::check() && Auth::user()->role == 3) {
            // return $next($request); 
        // }
        // elseif (Auth::check() && Auth::user()->role == 2) {
            // return redirect()->route('admin');
        // }
        // else {
            // return redirect()->route('login');
        // }
		
		
		if(Auth::check() && Auth::user()->role == 2){
            return $next($request);
        }
        return redirect()->route('login');
    }
}
