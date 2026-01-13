<?php

namespace Database\Seeders\Prod;

use App\Models\TemplateType;
use Illuminate\Database\Seeder;

class TemplateTypeSeeder extends Seeder
{
    public function run(): void
    {
        TemplateType::create(['code' => 'blade', 'name' => 'Файл выплаты в банк']);
    }
}
