<?php

namespace App\Http\Middleware;

use Closure;

class VerifyAdmin
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
        if (!$request->user()->is_admin) {
            if ($request->wantsJson()) {
                return response()->json(['Message', 'You do not access to this module.'], 403);
            }
            abort(403, 'You do not access to this module.');
        }
        return $next($request);
    }
}
