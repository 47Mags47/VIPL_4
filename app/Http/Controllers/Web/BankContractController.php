<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\StoreBankContractRequest;
use App\Http\Requests\UpdateBankContractRequest;
use App\Models\BankContract;

class BankContractController
{
    public function index()
    {
        return BankContract::getResource();
    }

    public function store(StoreBankContractRequest $request)
    {
        return BankContract::create($request->validated())->toResource();
    }

    public function show(BankContract $bankContract){
        return $bankContract->toResource();
    }

    public function update(UpdateBankContractRequest $request, BankContract $bankContract)
    {
        $bankContract->update($request->validated());

        return $bankContract->toResource();
    }

    public function destroy(BankContract $bankContract)
    {
        $bankContract->delete();

        return response('ok', 200);
    }
}
