<?php

namespace Database\Seeders\Local;

use App\Models\Bank;
use App\Models\File;
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
        PaymentFile::factory(10)->create([
            'bank_id' => Bank::all()->random()->id,
            'event_id' => PaymentEvent::all()->random()->id,
        ]);
    }
}
