<?php

namespace Database\Seeders\Local;

use App\Models\Template;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Template::create(['content' => Storage::disk('test')->get('template_Sber.php')]);
        Template::create(['content' => Storage::disk('test')->get('template_UralSib.php')]);
        Template::create(['content' => Storage::disk('test')->get('template_Rosselhoz.php')]);
    }
}
