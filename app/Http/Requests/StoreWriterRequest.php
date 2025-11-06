<?php

namespace App\Http\Requests;

use App\Models\Writer;
use App\Models\WriterType;
use Illuminate\Foundation\Http\FormRequest;

class StoreWriterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code' => ['required', 'string', 'max:255', 'unique:' . Writer::class . ',code'],
            'name' => ['required', 'string', 'max:255', 'unique:' . Writer::class . ',name'],
            'class' => ['required', 'string', 'max:255'],
            'type_id' => ['required', 'exists:' . WriterType::class . ',id'],
        ];
    }
}
