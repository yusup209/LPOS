<?php

namespace App\Http\Middleware;

use Closure;

class KasirMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (\Auth::user()->hak_akses != 'kasir'){
            return abort(404);
        }
        return $next($request);
    }
}
