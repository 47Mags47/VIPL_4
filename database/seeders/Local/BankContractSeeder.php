<?php

namespace Database\Seeders\Local;

use App\Models\BankContract;
use App\Models\Writer;
use Illuminate\Database\Seeder;

class BankContractSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Writer::all()->each(fn($writer) => BankContract::factory()->create([
            'writer_id' => $writer->id
        ]));
    }
}
