<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBankRequest;
use App\Http\Requests\UpdateBankRequest;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Bank::getResource();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBankRequest $request)
    {
        return Bank::create($request->validated())->toResource();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBankRequest $request, Bank $bank)
    {
        $bank->update($request->validated());

        return $bank->toResource();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bank $bank)
    {
        //
    }
}
