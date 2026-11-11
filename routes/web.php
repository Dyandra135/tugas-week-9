<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Halaman utama
Route::get('/', function () {
    return redirect('/login');
});

// Halaman login
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

// Proses login
Route::post('/login', [AuthController::class, 'login']);

// Route yang hanya bisa diakses setelah login
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Proses logout
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

});

// Route khusus Admin
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->group(function () {

        Route::get('/users', function () {
            return 'Halaman Manajemen Pengguna - Admin';
        });

        Route::get('/materi', function () {
            return 'Halaman Manajemen Materi - Admin';
        });

        Route::get('/nilai', function () {
            return 'Halaman Manajemen Nilai - Admin';
        });
    });

// Route khusus Dosen
Route::middleware(['auth', 'role:dosen'])
    ->prefix('dosen')
    ->group(function () {

        Route::get('/materi', function () {
            return 'Halaman Manajemen Materi - Dosen';
        });

        Route::get('/nilai', function () {
            return 'Halaman Manajemen Nilai - Dosen';
        });
    });

// Route khusus Mahasiswa
Route::middleware(['auth', 'role:mahasiswa'])
    ->prefix('mahasiswa')
    ->group(function () {

        Route::get('/materi', function () {
            return 'Halaman Melihat Materi - Mahasiswa';
        });

        Route::get('/nilai', function () {
            return 'Halaman Melihat Nilai - Mahasiswa';
        });
    });