<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
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
       $user = $request->user();
        if ($user && $user->role === 'admin') {
            return $next($request);
        }
        return $next($request)->route('/dashboard');
    }
}
