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
        User::query()->create([
            'username' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('useruser'),
        ]);

        User::query()->create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('adminadmin'),
            'role' => 'admin'
        ]);
    }
}
