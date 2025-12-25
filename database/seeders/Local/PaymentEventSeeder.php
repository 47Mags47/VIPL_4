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
        PaymentEvent::factory(5)->create([
            'payment_id' => 1
        ]);

        PaymentEvent::factory(5)->create([
            'payment_id' => 2
        ]);

        PaymentEvent::factory(5)->create([
            'payment_id' => 3
        ]);
    }
}
