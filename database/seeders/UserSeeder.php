<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@example.com',
                'role' => 'admin',
                'email_verified_at' => now(),
                'password' => Hash::make('admin'),
            ],
            [
                'name' => 'User',
                'username' => 'user',
                'email' => 'user@example.com',
                'role' => 'user',
                'email_verified_at' => now(),
                'password' => Hash::make('user'),
            ],
        ];

        foreach ($userData as $data) {
            User::create($data);
        }
    }
}
