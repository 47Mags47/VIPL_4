<?php

namespace Database\Seeders\Local;

use App\Models\Bank;
use App\Models\PaymentEvent;
use App\Models\PaymentFile;
use Illuminate\Database\Seeder;

class PaymentFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentEvent::all()->each(function ($event) {
            Bank::all()->each(function ($bank) use ($event) {
                PaymentFile::factory()->create([
                    'event_id' => $event->id,
                    'bank_id' => $bank->id,
                ]);
            });
        });
    }
}
