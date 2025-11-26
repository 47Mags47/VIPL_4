<?php

namespace Database\Seeders\Local;

use App\Models\PaymentEvent;
use Illuminate\Database\Seeder;

class PaymentEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentEvent::factory(100)->create();
    }
}
