<?php

namespace Database\Factories;

use App\Models\PaymentEvent;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PaymentRaport>
 */
class PaymentRaportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'event_id' => PaymentEvent::count() > 0
                ? PaymentEvent::all()->random()->id
                : PaymentEvent::factory()->create()->id,
        ];
    }
}
