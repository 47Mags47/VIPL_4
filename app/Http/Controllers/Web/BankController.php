<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\StoreBankRequest;
use App\Http\Requests\UpdateBankRequest;
use App\Models\Bank;

class BankController
{
    public function index()
    {
        return Bank::getResource();
    }

    public function store(StoreBankRequest $request)
    {
        return Bank::create($request->validated())->toResource();
    }

    public function show(Bank $bank){
        return $bank->toResource();
    }

    public function update(UpdateBankRequest $request, Bank $bank)
    {
        $bank->update($request->validated());

        return $bank->toResource();
    }

    public function destroy(Bank $bank)
    {
        $bank->delete();

        return response('ok', 200);
    }
}
