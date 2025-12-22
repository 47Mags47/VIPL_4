<?php

namespace App\Http\Requests;

use App\Models\Bank;
use App\Models\PaymentEvent;
use Illuminate\Foundation\Http\FormRequest;

class StorePaymentFileRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'file' => ['required', 'file', 'mimetypes:text/csv'],
            'bank_id' => ['required', 'exists:' . Bank::class . ',id'],
            'event_id' => ['required', 'exists:' . PaymentEvent::class . ',id'],
        ];
    }
}
