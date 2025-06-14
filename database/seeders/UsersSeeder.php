<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Nico Flassy',
            'email' => 'nikoflassy@gmail.com',
            'password' => Hash::make('123'),
            'followers' => rand(0, 100),
            'following' => rand(0, 100),
            'about' => 'Web Developer',
            'web' => 'https://example.com/user',
            'email_verified_at' => now(),
        ]);

         User::create([
            'name' => 'Yellow ',
            'email' => 'yellow@gmail.com',
            'password' => Hash::make('123'),
            'followers' => rand(0, 100),
            'following' => rand(0, 100),
            'about' => 'Kucingnya Nico',
            'web' => 'https://example.com/user',
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Ciko Ciko ',
            'email' => 'ciko@gmail.com',
            'password' => Hash::make('123'),
            'followers' => rand(0, 100),
            'following' => rand(0, 100),
            'about' => 'Kucingnya Nico Juga',
            'web' => 'https://example.com/user',
            'email_verified_at' => now(),
        ]);
    }
}
