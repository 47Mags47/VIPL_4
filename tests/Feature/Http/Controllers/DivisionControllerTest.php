<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\DivisionController;
use App\Models\Division;
use Tests\Cases\APIControllerCase;

class DivisionControllerTest extends APIControllerCase
{
    public $controller = DivisionController::class;
    public $routeName = 'divisions';
    public $model = Division::class;
    public $payload_key = 'division';
}
