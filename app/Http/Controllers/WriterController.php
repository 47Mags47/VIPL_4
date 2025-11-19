<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWriterRequest;
use App\Http\Requests\UpdateWriterRequest;
use App\Models\Writer;

class WriterController
{
    public function index()
    {
        return Writer::getResource();
    }

    public function store(StoreWriterRequest $request)
    {
        return Writer::create($request->validated())->toResource();
    }

    public function show(Writer $writer){
        return $writer->toResource();
    }

    public function update(UpdateWriterRequest $request, Writer $writer)
    {
        $writer->update($request->validated());

        return $writer->toResource();
    }

    public function destroy(Writer $writer)
    {
        $writer->delete();

        return response('ok', 200);
    }
}
