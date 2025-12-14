<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $roles)
    {
        $allowed = array_map('trim', explode('|', $roles));
        $user = $request->user();

        // Jika belum login, arahkan ke form login yang relevan
        if (!$user) {
            $loginRoute = in_array('pengantin', $allowed, true) ? 'pengantin.login' : 'login';

            return redirect()->route($loginRoute);
        }

        // Sudah login tapi tidak punya hak akses: arahkan ke dashboard perannya
        if (!in_array($user->role, $allowed, true)) {
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            if ($user->role === 'pengantin') {
                return redirect()->route('pengantin.dashboard');
            }

            // Default fallback jika role lain
            return redirect()->route('admin.login');
        }

        return $next($request);
    }
}
