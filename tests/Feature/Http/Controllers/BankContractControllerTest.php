<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\BankContractController;
use App\Models\BankContract;
use Tests\Cases\APIControllerCase;

class BankContractControllerTest extends APIControllerCase
{
    public $controller = BankContractController::class;
    public $routeName = 'bank-contracts';
    public $model = BankContract::class;
    public $payload_key = 'bank_contract';
}
