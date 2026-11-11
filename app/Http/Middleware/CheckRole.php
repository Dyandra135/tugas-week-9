<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(
        Request $request,
        Closure $next,
        ...$roles
    ): Response {

        // Memeriksa apakah pengguna sudah login
        if (!$request->user()) {
            return redirect('/login');
        }

        // Memeriksa role pengguna
        if (!in_array($request->user()->role, $roles)) {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        // Melanjutkan proses jika role sesuai
        return $next($request);
    }
}