<?php

namespace Database\Seeders\Local;

use App\Models\Bank;
use App\Models\BankFile;
use App\Models\PaymentEvent;
use Illuminate\Database\Seeder;

class BankFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BankFile::factory(50)->create([
            'bank_id' => Bank::all()->random()->id,
            'event_id' => PaymentEvent::all()->random()->id,
        ]);
    }
}
