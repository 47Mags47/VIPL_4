<?php

namespace Database\Seeders\Local;

use App\Models\PaymentEvent;
use App\Models\PaymentRaport;
use Illuminate\Database\Seeder;

class PaymentRaportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentEvent::all()->each(fn($event) => PaymentRaport::factory()->create([
            'event_id' => $event->id,
        ]));
    }
}
