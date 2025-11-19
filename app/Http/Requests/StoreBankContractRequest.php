<?php

namespace App\Http\Requests;

use App\Models\Writer;
use Illuminate\Foundation\Http\FormRequest;

class StoreBankContractRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'number' => ['required', 'string', 'max:255'],
            'signed_at' => ['required', 'date'],
            'writer_id' => ['required', 'exists:' . Writer::getTableName() . ',id']
        ];
    }
}
