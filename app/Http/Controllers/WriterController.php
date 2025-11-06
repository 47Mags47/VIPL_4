<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWriterRequest;
use App\Http\Requests\UpdateWriterRequest;
use App\Http\Resources\WriterResource;
use App\Models\Writer;

class WriterController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Writer::getResource();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWriterRequest $request)
    {
        return Writer::create($request->validated())->toResource();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWriterRequest $request, Writer $writer)
    {
        $writer->update($request->validated());

        return $writer->toResource();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Writer $writer)
    {
        $writer->delete();

        return response('ok', 200);
    }
}
