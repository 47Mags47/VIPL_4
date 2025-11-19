<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\TemplateController;
use App\Models\Template;
use Tests\Cases\Http\Controllers\APIControllerTestCase;

class TemplateControllerTest extends APIControllerTestCase
{
    public string $controllerType = parent::API_CONTROLLER;

    public string $controller = TemplateController::class;
    public string $model = Template::class;
    public string $route = 'templates';
    public string $payload_key = 'template';
}
