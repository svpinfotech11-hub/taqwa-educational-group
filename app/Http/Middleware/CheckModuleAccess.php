<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckModuleAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
   public function handle($request, Closure $next, $module)
{
    $user = auth()->user();

    if (!$user) {
        return redirect()->route('auth.login');
    }

    if (!$user->role || $user->role->modules->isEmpty() || !$user->role->modules->contains('slug', $module)) {
        abort(403, 'Unauthorized: No access to this module.');
    }

    return $next($request);
}

}
