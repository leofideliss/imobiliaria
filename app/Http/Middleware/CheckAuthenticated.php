<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class CheckAuthenticated
{
     /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle(Request $request, Closure $next)
    {
        if ( Auth::guard('admin')->check())
            return redirect()->route('admin.dashboard.index');
        else
            return $next($request);
    }
}
