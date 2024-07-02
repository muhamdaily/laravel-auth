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
                'province_id' => 35,
                'district_id' => 3508,
                'subdistrict_id' => 3508090,
                'username' => 'admin',
                'name' => 'Muhammad Mauribi',
                'gender' => 'Laki-laki',
                'address' => '(Toko Hendra Munder) Jl. Raya Krajan',
                'place_of_birth' => 'Lumajang',
                'date_of_birth' => '18-11-2003',
                'email' => 'admin@example.com',
                'phone' => '6285711152711',
                'role' => 'admin',
                'email_verified_at' => now(),
                'password' => Hash::make('admin'),
            ],
            // [
            //     'name' => 'User',
            //     'username' => 'user',
            //     'email' => 'user@example.com',
            //     'role' => 'user',
            //     'email_verified_at' => now(),
            //     'password' => Hash::make('user'),
            // ],
        ];

        foreach ($userData as $data) {
            User::create($data);
        }
    }
}
