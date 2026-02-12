<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\StorePaymentRaportRequest;
use App\Jobs\CreateBankFilesJob;
use App\Models\PaymentRaport;

class PaymentRaportController
{
    public function index(){
        return PaymentRaport::getResource();
    }

    public function store(StorePaymentRaportRequest $request){
        $raport = PaymentRaport::create([
            'event_id' => $request->input('event_id')
        ]);

        CreateBankFilesJob::dispatch($raport);

        return $raport->toResource();
    }

    public function show(PaymentRaport $paymentRaport){
        return $paymentRaport->toResource();
    }

    public function destroy(PaymentRaport $paymentRaport){
        $paymentRaport->delete();

        return response('ok', 200);
    }
}
