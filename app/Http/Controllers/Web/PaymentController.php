<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\Payment;

class PaymentController
{
    public function index()
    {
        return Payment::getResource();
    }

    public function store(StorePaymentRequest $request)
    {
        return Payment::create($request->validated())->toResource();
    }

    public function show(Payment $payment)
    {
        return $payment->toResource();
    }

    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        $payment->update($request->validated());

        return $payment->toResource();
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();

        return response('ok', 200);
    }
}
