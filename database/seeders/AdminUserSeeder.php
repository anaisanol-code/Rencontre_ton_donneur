<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@anais.test',
            'password' => Hash::make('Admin123!'),
            'role' => 'admin',
            'is_premium' => true,
        ]);
    }
}