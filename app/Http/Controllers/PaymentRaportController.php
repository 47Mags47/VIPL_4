<?php

namespace App\Http\Controllers;

use App\Models\PaymentEvent;
use App\Models\PaymentRaport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaymentRaportController
{
    public function index(Request $request){
        $query = PaymentRaport::filter();
        if($request->has('event_id'))
            $query->where('event_id', $request->input('event_id'));

        return $query->get()->toResourceCollection();
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
