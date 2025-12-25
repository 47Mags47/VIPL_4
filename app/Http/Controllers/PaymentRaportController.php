<?php

namespace App\Http\Controllers;

use App\Models\PaymentEvent;
use App\Models\PaymentRaport;
use Illuminate\Http\Request;

class PaymentRaportController
{
    public function index(Request $request){
        return PaymentRaport::getResource();
    }

    public function store(PaymentEvent $paymentEvent){
        $raport = PaymentRaport::create([
            'event_id' => $paymentEvent->id
        ]);

        return $raport->toResource();
    }

    public function show(PaymentEvent $paymentEvent, PaymentRaport $paymentRaport){
        return $paymentRaport->toResource();
    }

    public function destroy(PaymentEvent $paymentEvent, PaymentRaport $paymentRaport){
        $paymentRaport->delete();
    }
}
