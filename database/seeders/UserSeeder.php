<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123@#'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'employer',
            'email' => 'employer@gmail.com',
            'password' => Hash::make('employer123@#'),
            'role' => 'employer'
        ]);

        User::create([
            'name' => 'guide',
            'email' => 'guide@gmail.com',
            'password' => Hash::make('guide123@#'),
            'role' => 'guide'
        ]);
    }
}
