<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\WriterController;
use App\Models\Writer;
use Tests\Cases\APIControllerCase;

class WriterControllerTest extends APIControllerCase
{
    public $controller = WriterController::class;
    public $routeName = 'writers';
    public $model = Writer::class;
    public $payload_key = 'writer';
}
