<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'John Orga',
            'email' => 'organizer@ets.test',
            'role' => 'organizer',
            'business_name' => 'JO Events'
        ]);

        User::factory()->create([
            'name' => 'John Admo',
            'email' => 'admin@ets.test',
            'role' => 'admin',
            'business_name' => 'System admin'
        ]);

        User::factory()->create([
            'name' => 'John uzer',
            'email' => 'user@ets.test',
        ]);

        User::factory(5)->create();

        // Event::factory(30)->create();
    }
}
