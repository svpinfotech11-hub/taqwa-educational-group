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

        // User ka role aur allowed_modules fetch karo
        $role = $user->role; // assuming User model me role() relation define hai

        if (!$role) {
            abort(403, 'Role not assigned');
        }

        // allowed_modules ko JSON decode karo
        $allowedModules = json_decode($role->allowed_modules, true);

        // allowed_modules ko request me store karo (blade me use karne ke liye)
        $request->merge(['allowed_modules' => $allowedModules]);

        return $next($request);
    }
}
