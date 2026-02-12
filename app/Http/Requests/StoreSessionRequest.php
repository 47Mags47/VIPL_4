<?php

namespace App\Http\Requests;

use App\Models\Division;
use Illuminate\Foundation\Http\FormRequest;

class StoreSessionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email'         => ['email'],
            'login'         => ['required_without:email', 'string'],
            'password'      => ['required', 'string'],
            'remember'      => ['nullable'],
            'division_id'   => ['nullable', 'exists:' . Division::class . ',id']
        ];
    }
}
