<?php

namespace Database\Seeders\Local;

use App\Models\Bank;
use App\Models\BankFile;
use App\Models\PaymentRaport;
use Illuminate\Database\Seeder;

class BankFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BankFile::factory(50)->create();
    }
}
