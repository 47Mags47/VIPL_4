<?php

namespace Database\Seeders\Local;

use App\Models\PaymentFile;
use App\Models\Recipient;
use Illuminate\Database\Seeder;

class RecipientSeeder extends Seeder
{
    public function run(): void
    {
        PaymentFile::all()->each(function ($file) {
            Recipient::factory(10)->create(['file_id' => $file->id]);
        });
    }
}
