<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTemplateRequest;
use App\Http\Requests\UpdateTemplateRequest;
use App\Models\Template;

class TemplateController
{
    public function index()
    {
        return Template::getResource();
    }

    public function store(StoreTemplateRequest $request)
    {
        return Template::create($request->validated())->toResource();
    }

    public function show(Template $template){
        return $template->toResource();
    }

    public function update(UpdateTemplateRequest $request, Template $template)
    {
        $template->update($request->validated());

        return $template->toResource();
    }

    public function destroy(Template $template)
    {
        $template->delete();

        return response('ok', 200);
    }
}
