<?php

namespace App\Jobs;

use App\Models\Bank;
use App\Models\PaymentRaport;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Collection;

class CreateBankFilesJob implements ShouldQueue
{
    use Queueable;

    public function __construct(protected PaymentRaport $raport) {}

    public function handle(): void
    {
        $files = $this->raport->event->paymentFiles;

        $recipients_by_bank = $files->groupBy('bank_id')->map(function ($files) {
            return $files->map(fn($file) => $file->recipients)->collapse();
        });

        $recipients_by_bank->each(function ($recipients, $bank_id) {
            $bank = Bank::whereKey($bank_id)->first();

            $this->createBankFile($bank, $recipients);
        });
    }

    public function createBankFile(Bank $bank, Collection $recipients)
    {
        if ($bank->contract->template->chunk === null)
            CreateBankFileJob::dispatchSync($this->raport, $bank, $recipients);
        else
            $recipients->chunk($bank->contract->template->chunk)->each(function ($recipients) use ($bank) {
                CreateBankFileJob::dispatchSync($this->raport, $bank, $recipients->values());
            });
    }
}
