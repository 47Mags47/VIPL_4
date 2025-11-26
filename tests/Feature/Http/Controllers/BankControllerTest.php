<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\BankController;
use App\Models\Bank;
use Tests\Cases\APIControllerCase;

class BankControllerTest extends APIControllerCase
{
    public $controller = BankController::class;
    public $routeName = 'banks';
    public $model = Bank::class;
    public $payload_key = 'bank';
}
