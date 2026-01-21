<?php

namespace App\Jobs;

use App\Http\Resources\RecipientResource;
use App\Models\Bank;
use App\Models\BankFile;
use App\Models\File;
use App\Models\PaymentRaport;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Storage;

class CreateBankFileJob implements ShouldQueue
{
    use Queueable;

    public function __construct(
        protected PaymentRaport $raport,
        protected Bank $bank,
        protected Collection $recipients
    ) {}

    public function handle(): void
    {
        $file_name = $this->generateFileName();
        $file_content = $this->generateFileContent();

        $file = File::factory()->create([
            'disk' => 'bank-file',
            'origin_name' => $file_name
        ]);

        $bankFile = BankFile::create([
            'file_id' => $file->id,
            'bank_id' => $this->bank->id,
            'raport_id' => $this->raport->id,
        ]);

        Storage::disk($bankFile->disk)->put($bankFile->getLocalPath(), $file_content);
    }

    public function generateFileName()
    {
        return Blade::render($this->bank->contract->template->file_name, ['npp' => $this->getNPP()]);
    }

    public function getNPP()
    {
        return BankFile::where('bank_id', $this->bank->id)
            ->whereBetween('created_at', [
                $this->raport->event->date->startOfYear()->format('Y-m-d'),
                $this->raport->event->date->endOfYear()->format('Y-m-d')
            ])
            ->count() + 1;
    }

    public function generateFileData()
    {
        return [
            'recipients' => [
                'data' => RecipientResource::make($this->recipients)->toArray(request()),
                'meta' => [
                    'count' => $this->recipients->count(),
                    'summ' => $this->recipients->sum('summ')
                ],
            ],
            'bank' => $this->bank->toResource()->toArray(request()),
            'file' => [
                'npp' => $this->getNPP()
            ],
            'dates' => [
                'now' => now()->format('Y.m.d'),
                'event' => $this->raport->event->date->format('Y.m.d')
            ]
        ];
    }

    public function generateFileContent()
    {
        $template_content = Storage::disk($this->bank->contract->template->disk)
            ->get($this->bank->contract->template->getLocalPath());

        return Blade::render($template_content, $this->generateFileData());
    }
}
