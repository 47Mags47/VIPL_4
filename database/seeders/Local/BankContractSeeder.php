<?php

namespace Database\Seeders\Local;

use App\Models\BankContract;
use App\Models\Template;
use App\Models\TemplateType;
use Illuminate\Database\Seeder;

class BankContractSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Template::where('type_id', TemplateType::byCode('bankFile')->id)->each(fn($template) => BankContract::factory()->create([
            'template_id' => $template->id
        ]));
    }
}
