<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PreventGetRequests
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if ($request->isMethod('get')) {
            return redirect('/dashboard'); // change this to your desired redirect URL
        }

        return $next($request);
    }
}
