<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\PaymentFileController;
use App\Models\Bank;
use App\Models\PaymentEvent;
use App\Models\PaymentFile;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Tests\Cases\APIControllerCase;

class PaymentFileControllerTest extends APIControllerCase
{
    public $controller = PaymentFileController::class;
    public $routeName = 'payment-files';
    public $model = PaymentFile::class;
    public $payload_key = 'payment_file';

    public $methods = [
        'index',
        'store',
        'show',
        'update',
        'destroy'
    ];

    public function test_check_store_method()
    {
        $this->checkMethodExistance('store');

        $content = Storage::disk('local')->get('test/payment-file.csv');
        $upload_file = UploadedFile::fake()->createWithContent('test_' . Str::random(10) . '.csv', $content);

        $event = PaymentEvent::factory()->create();
        $bank = Bank::factory()->create();

        $response = $this->postJson(route($this->routeName . '.store'), [
            'file' => $upload_file,
            'event_id' => $event->id,
            'bank_id' => $bank->id,
        ]);

        $model = PaymentFile::findFromArray([
            'event_id' => $event->id,
            'bank_id' => $bank->id,
        ])->first();

        $response
            ->assertCreated()
            ->assertJsonIsObject()
            ->assertJsonFragment($model->toResource()->jsonSerialize());
    }

    public function test_check_update_method()
    {
        $this->checkMethodExistance('update');

        $file = PaymentFile::factory()->create();
        $payload = [
            'event_id' => PaymentEvent::factory()->create()->id,
            'bank_id' => Bank::factory()->create()->id,
        ];

        $response = $this->putJson(route($this->routeName . '.update', ['payment_file' => $file->id]), $payload);

        $response
            ->assertOk()
            ->assertJsonIsObject()
            ->assertJsonFragment($file->refresh()->toResource()->jsonSerialize());
    }
}
