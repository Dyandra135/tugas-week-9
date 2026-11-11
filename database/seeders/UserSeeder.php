<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Akun Admin
        User::firstOrCreate(
            ['email' => 'admin@kampus.test'],
            [
                'name' => 'Admin Tel-U',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ]
        );

        // Akun Dosen
        User::firstOrCreate(
            ['email' => 'dosen@kampus.test'],
            [
                'name' => 'Dewi Marini',
                'password' => Hash::make('dosen123'),
                'role' => 'dosen',
            ]
        );

        // Akun Mahasiswa
        User::firstOrCreate(
            ['email' => 'mahasiswa@kampus.test'],
            [
                'name' => 'Dyandra Putra',
                'password' => Hash::make('mahasiswa123'),
                'role' => 'mahasiswa',
            ]
        );
    }
}