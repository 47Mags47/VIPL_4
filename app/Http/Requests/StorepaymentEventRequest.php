<?php

namespace App\Http\Requests;

use App\Models\Payment;
use App\Models\PaymentEvent;
use Illuminate\Foundation\Http\FormRequest;

class StorepaymentEventRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'date' => ['required', 'date'],
            'payment_id' => ['required', 'exists:' . Payment::class . ',id'],
        ];
    }
}
