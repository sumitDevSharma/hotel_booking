<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@hotelbooking.com',
            'password' => Hash::make('123456789'), // Change the password for production
            'role' => 'admin',
        ]);
    }
}
