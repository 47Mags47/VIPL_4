<?php

namespace Database\Factories;

use App\Models\Bank;
use App\Models\File;
use App\Models\PaymentEvent;
use App\Models\PaymentFile;
use App\Models\Recipient;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PaymentFile>
 */
class PaymentFileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'file_id'   => File::factory()->create([
                'disk' => 'uploads',
            ]),
            'bank_id' => Bank::randomOrCreate()->id,
            'event_id'  => PaymentEvent::randomOrCreate(),
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (PaymentFile $file) {
            $recipients = Recipient::factory(10)->create([
                'file_id' => $file->id,
            ]);
            $template = Storage::disk('assets')->get('templates/Uploadfile_PaymentFile.blade.php');
            $file->setContent(Blade::render($template, compact('recipients')));
        });
    }
}
