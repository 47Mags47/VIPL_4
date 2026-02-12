<?php

namespace App\Http\Requests;

use App\Models\Bank;
use App\Models\BankContract;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBankRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code' => ['required', 'string', 'max:255', 'unique:' . Bank::class . ',code,' . $this->route('bank')->id . ',id'],
            'name' => ['required', 'string', 'max:255'],
            'contract_id' => ['required', 'exists:' . BankContract::class . ',id']
        ];
    }
}
