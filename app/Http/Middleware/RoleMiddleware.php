<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // Sesuaikan sesuai dengan struktur database Anda
        if ($user->role_id == 1) {
            $layout = 'layouts.admin';
        } elseif ($user->role_id == 2) {
            $layout = 'layouts.mekanik';
        } elseif ($user->role_id == 3) {
            $layout = 'layouts.user';
        } else {
            // Default layout jika role tidak cocok
            $layout = 'layouts.app';
        }

        \Log::info('Setting layout for user role:' . $user->role_id . ' to ' . $layout);

        // Share layout dengan semua views
        view()->share('layout', $layout);

        return $next($request);
    }
}
