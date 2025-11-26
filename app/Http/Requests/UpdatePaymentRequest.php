<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePaymentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code' => ['required', 'string', 'min:1', 'max:255'],
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'kbk' => ['required', 'string', 'min:20', 'max:20'],
        ];
    }
}
