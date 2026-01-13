<?php

namespace App\Http\Requests;

use App\Models\PaymentEvent;
use Illuminate\Foundation\Http\FormRequest;

class StorePaymentRaportRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'event_id' => ['required', 'exists:' . PaymentEvent::class . ',id']
        ];
    }
}
