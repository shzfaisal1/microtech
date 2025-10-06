<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
   public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->type === 'customer') {
            return $next($request);
        }

        return redirect()->route('login')->withErrors(['msg' => 'Access denied. Customers only.']);
    }
}
