<?php

namespace Database\Seeders;

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
            'email' => 'organizer@email.com',
            'role' => 'organizer',
            'business_name' => 'JO Events'
        ]);

        User::factory()->create([
            'name' => 'John Admo',
            'email' => 'admin@email.com',
            'role' => 'admin'
        ]);

        User::factory(5)->create();


    }
}
