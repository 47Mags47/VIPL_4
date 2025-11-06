<?php

namespace App\Http\Requests;

use App\Models\Writer;
use App\Models\WriterType;
use Illuminate\Foundation\Http\FormRequest;

class UpdateWriterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code' => ['required', 'string', 'max:255', 'unique:' . Writer::class .',code,' . $this->route('writer')->id],
            'name' => ['required', 'string', 'max:255', 'unique:' . Writer::class . ',name,' . $this->route('writer')->id],
            'class' => ['required', 'string', 'max:255'],
            'type_id' => ['required', 'exists:' . WriterType::class . ',id'],
        ];
    }
}
