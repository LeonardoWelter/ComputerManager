<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Group
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param Integer $group 
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $group)
    {
        if (Auth::user()->group != $group) {
            $request->session()->flash('status', 'ACESSO NEGADO');

            return redirect('dashboard');

        }

        return $next($request);
    }
}
