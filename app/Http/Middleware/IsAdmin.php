<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Cek apakah user sudah login
        // 2. Cek apakah field 'role' pada table users bernilai 'admin'
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            
            // Jika bukan admin, tolak akses (Error 403 Forbidden)
            abort(403, 'Akses Ditolak! Anda bukan administrator.');
        }

        return $next($request);
    }
}
