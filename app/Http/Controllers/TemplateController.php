<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTemplateRequest;
use App\Http\Requests\UpdateTemplateRequest;
use App\Models\File;
use App\Models\Template;
use App\Models\TemplateType;
use Illuminate\Support\Facades\Storage;

class TemplateController
{
    public function index()
    {
        return Template::getResource();
    }

    public function store(StoreTemplateRequest $request)
    {
        $file = File::factory()->create([
            'disk' => 'templates',
            'path' => '',
            'origin_name' => $request->file('file')->getBasename(),
        ]);

        $template = Template::create([
            'name' => $request->input('name'),
            'chunk' => $request->input('chunk'),
            'file_id' => $file->id,
            'type_id' => TemplateType::byCode('template')->id,
        ]);

        Storage::disk($template->disk)->writeStream($template->getLocalPath(), $request->input('content'));

        return $template->toResource();
    }

    public function show(Template $template){
        return response()->json([
            ...$template->toResource()->toArray(request()),
            'content' => $template->getContent(),
        ]);
    }

    public function update(UpdateTemplateRequest $request, Template $template)
    {
        $template->update([
            'name' => $request->input('name'),
        ]);

        Storage::disk($template->disk)->writeStream($template->getLocalPath(), $request->input('content'));

        return $template->toResource();
    }

    public function destroy(Template $template)
    {
        $template->delete();

        return response('ok', 200);
    }
}
