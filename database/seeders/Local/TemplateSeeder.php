<?php

namespace Database\Seeders\Local;

use App\Models\File;
use App\Models\Template;
use App\Models\TemplateStyle;
use App\Models\TemplateType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class TemplateSeeder extends Seeder
{
    public function run(): void
    {
        $template = Template::create([
            'name' => 'Выплата в Сбер',
            'file_name' => 'f8615{{ substr($npp, 2, 3) }}.xml',
            'file_id' => File::factory()->create([
                'disk' => 'templates',
                'origin_name' => 'BankFile_Sber.blade.php',
                'upload_at' => null
            ])->id,
            'type_id' => TemplateType::byCode('bankFile')->id,
            'style_id' => TemplateStyle::byCode('blade')->id,
            'chunk' => 25000
        ]);
        $template->setContent(Storage::disk('assets')->get('templates/BankFile_Sber.blade.php'));

        $template = Template::create([
            'name' => 'Выплата в УралСиб',
            'file_name' => '55557460{{ substr($npp, 0, 3) }}I{{ substr($npp, 3, 2) }}',
            'file_id' => File::factory()->create([
                'disk' => 'templates',
                'origin_name' => 'BankFile_UralSib.blade.php',
                'upload_at' => null
            ])->id,
            'type_id' => TemplateType::byCode('bankFile')->id,
            'style_id' => TemplateStyle::byCode('blade')->id,
        ]);
        $template->setContent(Storage::disk('assets')->get('templates/BankFile_UralSib.blade.php'));

        $template = Template::create([
            'name' => 'Выплата в Россельхоз',
            'file_name' => '{{ substr($npp, 0, 5) }}.xml',
            'file_id' => File::factory()->create([
                'disk' => 'templates',
                'origin_name' => 'BankFile_Rosselhoz.blade.php',
                'upload_at' => null
            ])->id,
            'type_id' => TemplateType::byCode('bankFile')->id,
            'style_id' => TemplateStyle::byCode('blade')->id,
        ]);
        $template->setContent(Storage::disk('assets')->get('templates/BankFile_Rosselhoz.blade.php'));

        $template = Template::create([
            'name' => 'Список получателей',
            'file_name' => 'Uploadfile_PaymentFile.blade.php',
            'file_id' => File::factory()->create([
                'disk' => 'templates',
                'origin_name' => 'Uploadfile_PaymentFile.blade.php',
                'upload_at' => null
            ])->id,
            'type_id' => TemplateType::byCode('uploadFile')->id,
            'style_id' => TemplateStyle::byCode('blade')->id,
        ]);
        $template->setContent(Storage::disk('assets')->get('templates/Uploadfile_PaymentFile.blade.php'));
    }
}
