<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDivisionRequest;
use App\Http\Requests\UpdateDivisionRequest;
use App\Models\Division;
use Illuminate\Http\Request;

class DivisionController
{
    public function index()
    {
        return Division::getResource();
    }

    public function store(StoreDivisionRequest $request)
    {
        return Division::create($request->validated())->toResource();
    }

    public function show(Division $division)
    {
        return $division->toResource();
    }

    public function update(UpdateDivisionRequest $request, Division $division)
    {
        $division->update($request->validated());

        return $division->toResource();
    }

    public function destroy(Division $division)
    {
        $division->delete();

        return response('ok', 200);
    }
}
