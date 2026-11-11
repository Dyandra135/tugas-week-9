<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Memproses login pengguna
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Memeriksa email dan password
        if (Auth::attempt($credentials)) {

            // Memperbarui session setelah login
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        // Jika login gagal
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    // Memproses logout
    public function logout(Request $request)
    {
        Auth::logout();

        // Menghapus session pengguna
        $request->session()->invalidate();

        // Membuat token CSRF baru
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
