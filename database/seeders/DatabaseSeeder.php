<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $admin = User::create([
            'email' => 'admin@email.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'user_type' => 'Admin',
        ]);

        $admin->userDetail()->create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
        ]);

    }
}
