<?php

namespace Database\Seeders\Prod;

use App\Models\TemplateType;
use Illuminate\Database\Seeder;

class TemplateTypeSeeder extends Seeder
{
    public function run(): void
    {
        TemplateType::create(['code' => 'bankFile',         'name' => 'Файл для отправки в банк']);
        TemplateType::create(['code' => 'uploadFile',   'name' => 'Файл для загрузки в систему']);
    }
}
