<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Listing;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'is_admin' => true
        ]);
                User::factory()->create([
            'name' => 'Test User',
            'email' => 'test2@example.com',
        ]);

        Listing::factory(50)->create();
         \App\Models\Listing::factory(20)->create([
            'by_user_id' => 1,
        ]);
        \App\Models\Listing::factory(10)->create([
            'by_user_id' => 2,
        ]);

    }
}
