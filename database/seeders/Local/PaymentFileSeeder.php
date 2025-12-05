<?php

namespace Database\Seeders\Local;

use App\Models\PaymentFile;
use Illuminate\Database\Seeder;

class PaymentFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentFile::factory(10)->create();
    }
}
