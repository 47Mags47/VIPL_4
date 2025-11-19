<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\BankController;
use App\Models\Bank;
use Tests\Cases\Http\Controllers\APIControllerTestCase;

class BankControllerTest extends APIControllerTestCase
{
    public string $controllerType = parent::API_CONTROLLER;

    public string $controller = BankController::class;
    public string $model = Bank::class;
    public string $route = 'banks';
    public string $payload_key = 'bank';
}
