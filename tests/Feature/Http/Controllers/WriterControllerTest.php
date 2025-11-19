<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\WriterController;
use App\Models\Writer;
use Tests\Cases\Http\Controllers\APIControllerTestCase;

class WriterControllerTest extends APIControllerTestCase
{
    public string $controllerType = parent::API_CONTROLLER;

    public string $controller = WriterController::class;
    public string $model = Writer::class;
    public string $route = 'writers';
    public string $payload_key = 'writer';
}
