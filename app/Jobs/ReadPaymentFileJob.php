<?php

namespace App\Jobs;

use App\Imports\PaymentFileImport;
use App\Models\PaymentFile;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class ReadPaymentFileJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public PaymentFile $file
    ) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if (!$this->file->mime === 'text/csv') {
            $this->file->addError('Файл не является csv');
            return;
        }

        try {
            (new PaymentFileImport($this->file))
                ->import(
                    $this->file->getLocalPath(),
                    $this->file->disk,
                    \Maatwebsite\Excel\Excel::CSV
                );

            $this->file->deleteFromStorage();
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();

            foreach ($failures as $failure) {
                foreach ($failure->errors() as $error) {
                    Log::error($error);

                    $this->file->addError($error);
                }
            }
        }
    }
}
