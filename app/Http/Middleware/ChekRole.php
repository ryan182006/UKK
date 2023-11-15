<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
class ChekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$chekRoles)
    {
        if(in_array($request->user()->role,$chekRoles)){
            return $next($request);
        }
        return redirect('/beranda');
    }
}
