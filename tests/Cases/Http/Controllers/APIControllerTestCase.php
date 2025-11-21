<?php

namespace Tests\Cases\Http\Controllers;

use Tests\Traits\AvailableAPIMethods;
use Tests\Traits\HasAPIMethods;
use Tests\Traits\ValidAPIMethods;

abstract class APIControllerTestCase extends ControllerTestCase
{
    use
        AvailableAPIMethods,
        HasAPIMethods,
        ValidAPIMethods;

    public string $controllerType = 'api';

    public string $model;
    public string $route;
    public string $payload_key;

    public array $payload = [];
    public array $methods = [
        'index',
        'store',
        'show',
        'update',
        'destroy'
    ];
}
