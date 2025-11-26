<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\PaymentEventController;
use App\Models\PaymentEvent;
use Tests\Cases\APIControllerCase;

class PaymentEventControllerTest extends APIControllerCase
{
    public $controller = PaymentEventController::class;
    public $routeName = 'payment-events';
    public $model = PaymentEvent::class;
    public $payload_key = 'payment_event';
}
