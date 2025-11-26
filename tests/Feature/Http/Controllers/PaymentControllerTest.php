<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\PaymentController;
use App\Models\Payment;
use Tests\Cases\APIControllerCase;

class PaymentControllerTest extends APIControllerCase
{
    public $controller = PaymentController::class;
    public $routeName = 'payments';
    public $model = Payment::class;
    public $payload_key = 'payment';
}
