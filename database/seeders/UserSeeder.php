<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name_en' => 'Admin',
            'name_ne' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 0
        ]);
        User::create([
            'name_en' => 'User',
            'name_ne' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
            'role' => 1
        ]);
    }
}
