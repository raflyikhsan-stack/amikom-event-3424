<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\IsAdmin;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Mendaftarkan alias middleware secara paten
        $middleware->alias([
            'admin' => IsAdmin::class,
        ]);

        // Mengarahkan tamu (unauthenticated) yang nekat akses route proteksi ke halaman login admin
        $middleware->redirectTo(
            'admin/login'
        );

        // Mengecualikan route webhook Midtrans dari blokir CSRF (Tambahan Modul 12)
        $middleware->validateCsrfTokens(except: [
            '/midtrans/callback',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();