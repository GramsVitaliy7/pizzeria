<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class AllowOnlyAjaxRequest
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
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
