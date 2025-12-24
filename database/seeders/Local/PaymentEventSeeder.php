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
        Payment::all()->each(fn($payment) => PaymentEvent::factory(5)->create([
            'payment_id' => $payment->id
        ]));
    }
}
