<?php

namespace App\Http\Middleware;

use App\Models\Configurations;
use Closure;
use Illuminate\Http\Request;

class RefreshAccessWebSite
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
        $config = Configurations::first();
        if ($config != null) {
            if ($config->website_access == null)
                $config->website_access = 1;
            else
                $config->website_access++;
            $config->update();
        }
        return $next($request);
    }
}
