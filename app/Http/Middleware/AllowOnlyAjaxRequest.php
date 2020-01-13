<?php

namespace App\Http\Middleware;

use Closure;

class AllowOnlyAjaxRequest
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
        if (!$request->ajax()) {
            return response()->json(['error' => 'Ajax allow only!']);
        }
        return $next($request);
    }
}
