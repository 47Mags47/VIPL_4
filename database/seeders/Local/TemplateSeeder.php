<?php

namespace Database\Seeders\Local;

use App\Models\File;
use App\Models\Template;
use App\Models\TemplateType;
use Illuminate\Database\Seeder;

class TemplateSeeder extends Seeder
{
    public function run(): void
    {
        Template::create([
            'name' => 'Выплата в Сбер',
            'file_name' => 'f8615{{ substr($npp, 2, 3) }}.xml',
            'file_id' => File::factory()->create([
                'disk' => 'templates',
                'name' => 'BankFile_Sber.blade.php',
                'origin_name' => 'BankFile_Sber.blade.php',
                'upload_at' => null
            ])->id,
            'type_id' => TemplateType::byCode('blade')->id,
            'chunk' => 25000
        ]);

        Template::create([
            'name' => 'Выплата в УралСиб',
            'file_name' => '55557460{{ substr($npp, 0, 3) }}I{{ substr($npp, 3, 2) }}',
            'file_id' => File::factory()->create([
                'disk' => 'templates',
                'name' => 'BankFile_UralSib.blade.php',
                'origin_name' => 'BankFile_UralSib.blade.php',
                'upload_at' => null
            ])->id,
            'type_id' => TemplateType::byCode('blade')->id,
        ]);

        Template::create([
            'name' => 'Выплата в Россельхоз',
            'file_name' => '{{ substr($npp, 0, 5) }}.xml',
            'file_id' => File::factory()->create([
                'disk' => 'templates',
                'name' => 'BankFile_Rosselhoz.blade.php',
                'origin_name' => 'BankFile_Rosselhoz.blade.php',
                'upload_at' => null
            ])->id,
            'type_id' => TemplateType::byCode('blade')->id,
        ]);
    }
}
