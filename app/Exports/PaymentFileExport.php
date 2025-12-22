<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PaymentFileExport implements FromCollection, WithMapping, WithCustomCsvSettings
{
    use Exportable;

    public function __construct(public Collection $data){

    }

    public function getCsvSettings(): array
    {
        return [
            'output_encoding' => 'CP866',
            'delimiter' => ";",
            'enclosure' => false,
        ];
    }

    public function collection(): Collection
    {
        return $this->data->each(function ($recipient, $key) {
            $recipient->id = $key + 1;
        });
    }

    public function map($recipient): array
    {
        return [
            $recipient->id,
            $recipient->last_name,
            $recipient->first_name,
            $recipient->middle_name,
            $recipient->d_rojd->format('d.m.Y'),
            $recipient->snils,
            $recipient->account,
            number_format($recipient->summ, 2, '.', ''),
            $recipient->p_series,
            $recipient->p_number,
            $recipient->p_date->format('d.m.Y'),
            $recipient->p_div,
        ];
    }
}
