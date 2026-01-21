<?php

namespace Database\Seeders\Local;

use App\Models\Payment;
use App\Models\PaymentEvent;
use Illuminate\Database\Seeder;

class PaymentEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payment = Payment::randomOrCreate();

        PaymentEvent::factory()->create([
            'date' => now()->subDay(2),
            'payment_id' => $payment->id
        ]);
        PaymentEvent::factory()->create([
            'date' => now()->subDay(1),
            'payment_id' => $payment->id
        ]);
        PaymentEvent::factory()->create([
            'date' => now(),
            'payment_id' => $payment->id
        ]);
        PaymentEvent::factory()->create([
            'date' => now()->addDay(1),
            'payment_id' => $payment->id
        ]);
        PaymentEvent::factory()->create([
            'date' => now()->addDay(1),
            'payment_id' => $payment->id
        ]);
    }
}
