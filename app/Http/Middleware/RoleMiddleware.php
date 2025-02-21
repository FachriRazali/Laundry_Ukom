<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        // 🚀 Allow multiple roles (Admin, Kasir, Owner)
        $roles = explode(',', $role);
        if (!in_array(Auth::user()->role, $roles)) {
            return redirect('/dashboard')->with('error', 'You do not have permission to access this page.');
        }

        return $next($request);
    }
}
