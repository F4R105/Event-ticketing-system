<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\User;
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
            'name' => 'John Uzer',
            'email' => 'user@ets.test',
        ]);

        Event::factory()->create([
            'name' => 'Zoezi la kuwasha mwenge',
            'venue' => 'Nalphin hotel, Muleba - Kagera',
            'details' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In similique ipsam numquam incidunt facilis rem exercitationem error quisquam doloribus ea sunt nesciunt accusamus repellat minus iste quia harum, expedita deleniti animi minima voluptas perferendis quibusdam? Laboriosam totam, quam magnam autem deleniti sint tempora commodi aliquam dolor reprehenderit! Natus, unde harum.',
            'event_date' => '2025-07-31T16:41',
            'ticket_price' => 3000,
            'available_tickets' => 100,
            'booking_start_date' => '2025-07-25',
            'booking_deadline_date' => '2025-07-29',
            'user_id' => 1
        ]);

        Event::factory()->create([
            'name' => 'Kili Marathon',
            'venue' => 'White rose hotel, Siha - Moshi',
            'details' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In similique ipsam numquam incidunt facilis rem exercitationem error quisquam doloribus ea sunt nesciunt accusamus repellat minus iste quia harum, expedita deleniti animi minima voluptas perferendis quibusdam? Laboriosam totam, quam magnam autem deleniti sint tempora commodi aliquam dolor reprehenderit! Natus, unde harum.',
            'event_date' => '2025-08-01T16:00',
            'ticket_price' => 15000,
            'available_tickets' => 150,
            'booking_start_date' => '2025-05-01',
            'booking_deadline_date' => '2025-07-01',
            'user_id' => 2
        ]);

        // User::factory(5)->create();

        // Event::factory(30)->create();
    }
}
