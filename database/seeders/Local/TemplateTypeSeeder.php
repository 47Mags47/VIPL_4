<?php

namespace Database\Seeders\Local;

use App\Models\TemplateType;
use Illuminate\Database\Seeder;

class TemplateTypeSeeder extends Seeder
{
    public function run(): void
    {
        TemplateType::create(['code' => 'bank-file', 'name' => 'Файл выплаты в банк']);
    }
}
