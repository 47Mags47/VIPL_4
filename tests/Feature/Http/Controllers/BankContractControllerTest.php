<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\BankContractController;
use App\Models\BankContract;
use Tests\Cases\Http\Controllers\APIControllerTestCase;

class BankContractControllerTest extends APIControllerTestCase
{
    public string $controllerType = parent::API_CONTROLLER;
    public string $controller = BankContractController::class;
    public string $model = BankContract::class;
    public string $route = 'bank-contracts';
    public string $payload_key = 'bank_contract';
}
