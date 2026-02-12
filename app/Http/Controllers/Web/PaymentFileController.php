<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\StorePaymentFileRequest;
use App\Http\Requests\UpdatePaymentFileRequest;
use App\Jobs\ReadPaymentFileJob;
use App\Models\File;
use App\Models\PaymentFile;
use Illuminate\Support\Str;

class PaymentFileController
{
    public function index()
    {
        return PaymentFile::getResource();
    }

    public function store(StorePaymentFileRequest $request)
    {
        $file = File::create([
            'disk' => 'local',
            'path' => 'uploads',
            'name' => Str::random(40),
            'origin_name' => $request->file('file')->getBasename(),
        ]);

        $request->file('file')->storeAs('uploads', $file->name);

        $payment_file = PaymentFile::create(array_merge($request->validated(), [
            'file_id' => $file->id,
        ]));

        ReadPaymentFileJob::dispatch($payment_file);

        return $payment_file->toResource();
    }

    public function show(PaymentFile $paymentFile)
    {
        return $paymentFile->toResource();
    }

    public function update(UpdatePaymentFileRequest $request, PaymentFile $paymentFile)
    {
        $paymentFile->update($request->validated());

        return $paymentFile->toResource();
    }

    public function destroy(PaymentFile $paymentFile)
    {
        $paymentFile->delete();

        return response('ok', 200);
    }
}
