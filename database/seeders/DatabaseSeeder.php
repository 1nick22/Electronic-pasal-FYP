<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            CategorySeeder::class,
        ]);

        User::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@electronicpasal.com',
            'password' => 'password123', // Will be hashed by Model attribute casting if using Laravel 9+ logic in User model, otherwise Hash::make.
            // User model has 'password' => 'hashed' cast, so simple string is fine.
            'role' => 'admin',
        ]);
    }
}
