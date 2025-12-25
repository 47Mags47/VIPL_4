<?php

namespace Database\Seeders\Local;

use App\Models\BankContract;
use App\Models\Template;
use Illuminate\Database\Seeder;

class BankContractSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Template::all()->each(fn($template) => BankContract::factory()->create([
            'template_id' => $template->id
        ]));
    }
}
