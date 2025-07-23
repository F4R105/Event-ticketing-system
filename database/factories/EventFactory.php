<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->firstName().' '.fake()->lastName(),
            'venue' => fake()->streetAddress(),
            'details' => fake()->paragraph(5),
            'ticket_price' => fake()->numberBetween(10000,90000),
            'available_tickets' => fake()->numberBetween(10,100),
            'event_date' => fake()->dateTime(),
            'booking_start_date' => fake()->date(),
            'booking_deadline_date' => fake()->date(),
            'user_id' => 2
        ];
    }
}
