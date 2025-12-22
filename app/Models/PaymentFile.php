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
    public static function generateFakeOnlyFile(array|null $data = null): string
    {
        $file_name = Str::random(40);

        $data = $data !== null
            ? $data
            : Recipient::factory(50)
            ->recycle(PaymentFile::factory()->create())
            ->make();

        (new PaymentFileExport($data))
            ->store('test' . '/' . $file_name, 'local', \Maatwebsite\Excel\Excel::CSV);

        return $file_name;
    }

    public static function generateFakeFile(array|null $data = null): File
    {
        $file_name = self::generateFakeOnlyFile($data);

        return File::create([
            'disk' => 'local',
            'path' => 'test',
            'name' => $file_name,
            'origin_name' => 'payment-file.csv',
        ]);
    }

    public static function fakeGenerate(array|null $data = null): self
    {
        $file = self::generateFakeFile($data);

        $bank_id = in_array('bank_id', $data ?? []) ? $data['bank_id'] : Bank::factory()->create()->id;
        $event_id = in_array('event_id', $data ?? []) ? $data['event_id'] : PaymentEvent::factory()->create()->id;

        return self::create(
            [
                'file_id' => $file->id,
                'bank_id' => $bank_id,
                'event_id' => $event_id,
            ]
        );
    }

    ### Связи
    ##################################################
    //
}
