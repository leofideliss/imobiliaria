<?php

namespace App\Http\Middleware;

use App\Models\Property;
use Closure;
use Illuminate\Http\Request;

class RefreshAccessInProperty
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

        $propertie = Property::where([['id', '=', $request->id]])->first();
        if ($propertie != null) {
            $propertie->qtd_access++;
            $propertie->update();
        }

        return $next($request);
    }
}
