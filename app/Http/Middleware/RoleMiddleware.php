<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle($request, Closure $next, ...$roles)
    // {
    //     $user = auth()->user();

    //     if (!$user) {
    //         return redirect()->route('auth.login');
    //     }

    //     if (!$user->role) {
    //         abort(403, 'Unauthorized: No role assigned.');
    //     }

    //     if (!in_array(strtolower($user->role->name), array_map('strtolower', $roles))) {
    //         abort(403, 'Unauthorized: You do not have access to this page.');
    //     }

    //     return $next($request);
    // }

    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('auth.login');
        }

        $user = Auth::user();
        $permissions = $user->permissions;

        if (empty($permissions)) {
            $permissions = [];
        } elseif (is_string($permissions)) {
            $permissions = json_decode($permissions, true);

            if (!is_array($permissions)) {
                $permissions = [];
            }
        }

        if (in_array('all', $permissions)) {
            return $next($request);
        }
        
        $request->merge(['allowed_modules' => $permissions]);

        return $next($request);
    }
}
