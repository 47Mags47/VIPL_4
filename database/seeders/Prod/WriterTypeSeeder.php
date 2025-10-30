<?php

namespace Database\Seeders\Prod;

use App\Models\WriterType;
use Illuminate\Database\Seeder;

class WriterTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WriterType::create(['code' => 'bank file', 'name' => 'файл в банк']);
    }
}
