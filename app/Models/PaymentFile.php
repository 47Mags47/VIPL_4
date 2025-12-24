<?php

namespace App\Models;

use App\Classes\BaseModel;
use App\Exports\PaymentFileExport;
use App\Traits\ThisFileModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class PaymentFile extends BaseModel
{
    ### Настройки
    ##################################################
    use HasFactory, ThisFileModel;

    protected $fillable = [
        'file_id',
        'bank_id',
        'event_id'
    ];

    ### Методы
    ##################################################
    public static function generateFakeOnlyFile(?array $data = null): string
    {
        $file_name = Str::random(40);

        $data = $data ?: Recipient::factory(50)
            ->recycle(PaymentFile::factory()->create())
            ->make();

        (new PaymentFileExport($data))
            ->store('test' . '/' . $file_name, 'local', \Maatwebsite\Excel\Excel::CSV);

        return $file_name;
    }

    public static function generateFakeFile(?array $data = null): File
    {
        $file_name = self::generateFakeOnlyFile($data);

        return File::create([
            'disk' => 'local',
            'path' => 'test',
            'name' => $file_name,
            'origin_name' => 'payment-file.csv',
        ]);
    }

    public static function fakeGenerate(?array $data = null, ?Bank $bank = null, ?PaymentEvent $event = null): self
    {
        $file = self::generateFakeFile($data);

        $bank= $bank ?: Bank::factory()->create();
        $event = $event ?: PaymentEvent::factory()->create();

        return self::create(
            [
                'file_id' => $file->id,
                'bank_id' => $bank->id,
                'event_id' => $event->id,
            ]
        );
    }

    ### Связи
    ##################################################
    //
}
