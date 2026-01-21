<?php

namespace Database\Seeders\Local;

use App\Jobs\CreateBankFilesJob;
use App\Models\PaymentRaport;
use Illuminate\Database\Seeder;

class BankFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentRaport::all()->each(fn($raport) => CreateBankFilesJob::dispatchSync($raport));
    }
}
