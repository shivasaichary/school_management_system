<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsParent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->user_type == 'parent') {
            return $next($request);

        }
         else if (auth()->user()->user_type == 'student'){
            return $next($request);

        } else {
            return redirect()->route("home");
        }
    }
}
