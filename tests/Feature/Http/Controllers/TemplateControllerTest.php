<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\TemplateController;
use App\Models\Template;
use Tests\Cases\APIControllerCase;

class TemplateControllerTest extends APIControllerCase
{
    public $controller = TemplateController::class;
    public $routeName = 'templates';
    public $model = Template::class;
    public $payload_key = 'template';
}
