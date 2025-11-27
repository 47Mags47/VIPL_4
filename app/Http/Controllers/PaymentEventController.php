<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorepaymentEventRequest;
use App\Http\Requests\UpdatepaymentEventRequest;
use App\Models\PaymentEvent;

class PaymentEventController
{
    public function index()
    {
        return PaymentEvent::getResource();
    }

    public function store(StorepaymentEventRequest $request)
    {
        return PaymentEvent::create($request->validated())->toResource();
    }

    public function show(PaymentEvent $paymentEvent){
        return $paymentEvent->toResource();
    }

    public function update(UpdatepaymentEventRequest $request, PaymentEvent $paymentEvent)
    {
        $paymentEvent->update($request->validated());

        return $paymentEvent->toResource();
    }

    public function destroy(PaymentEvent $event)
    {
        $event->delete();

        return response('ok', 200);
    }
}
