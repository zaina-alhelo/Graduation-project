<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {   $user = Auth::user();
        if (!$request->user() || !$request->user()->{"is" . ucfirst($role)}()) {
            abort(403, 'You are not authorized to access this page.');
        }

        return $next($request);
    }
}
