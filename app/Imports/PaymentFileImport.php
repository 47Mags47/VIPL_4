<?php

namespace App\Imports;

use App\Models\PaymentFile;
use App\Models\Recipient;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\RemembersRowNumber;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithValidation;

class PaymentFileImport implements
    ToModel,
    WithValidation,
    WithCustomCsvSettings,
    WithBatchInserts,
    WithChunkReading,
    WithEvents
{
    use RegistersEventListeners, RemembersRowNumber, Importable;

    public function __construct(public PaymentFile $file) {}

    public function getCsvSettings(): array
    {
        return [
            'input_encoding' => 'CP866',
            'delimiter' => ";"
        ];
    }

    public function batchSize(): int
    {
        return 100;
    }

    public function chunkSize(): int
    {
        return 100;
    }

    public function model(array $row)
    {
        return new Recipient([
            'file_id' => $this->file->id,

            'first_name'        => $row[1] !== null ? mb_strtoupper($row[1]) : null,
            'last_name'         => mb_strtoupper($row[2]),
            'middle_name'       => $row[3] !== null ? mb_strtoupper($row[3]) : null,
            'd_rojd'            => Carbon::parse($row[4])->format('Y-m-d'),
            'snils'             => $row[5],
            'account'           => $row[6],
            'summ'              => $row[7],
            'p_series'          => $row[8] ?? null,
            'p_number'          => $row[9] ?? null,
            'p_date'            => $row[10] !== null ? Carbon::parse($row[10])->format('Y-m-d') : null,
            'p_div'             => $row[11] ?? null,
        ]);
    }

    public function rules(): array
    {
        // HACK Изменить правила на динамические (заполняются пользователем)
        return [
            '1'     => ['nullable'],
            '2'     => ['required', 'string', 'min:1', 'max:255'],
            '3'     => ['nullable', 'string', 'min:1', 'max:255'],
            '4'     => ['nullable', 'date_format:d.m.Y'],
            '5'     => ['required', 'regex:/[0-9]{3}-[0-9]{3}-[0-9]{3} [0-9]{2}/'],
            '6'     => ['required', 'regex:/[0-9]{20}/'],
            '7'     => ['required', 'decimal:0,2'],
            '8'     => ['nullable', 'regex:/[0-9]{4}/'],
            '9'     => ['nullable', 'regex:/[0-9]{6}/'],
            '10'    => ['nullable', 'date_format:dY.m.Y'],
            '11'    => ['nullable', 'string']
        ];
    }

    public function customValidationAttributes()
    {
        return [
            '1'     => '"Имя"',
            '2'     => '"Фамилия"',
            '3'     => '"Отчество"',
            '4'     => '"Дата рождения"',
            '5'     => '"СНИЛС"',
            '6'     => '"Счет"',
            '7'     => '"Сумма"',
            '8'     => '"Серия паспорта"',
            '9'     => '"Номер паспорта"',
            '10'    => '"Дата выдачи"',
            '11'    => '"Кем выдан"',
        ];
    }
}
