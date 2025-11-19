<?php

namespace Tests\Cases\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class ControllerTestCase extends BaseTestCase
{
    use
        RefreshDatabase;

    protected $seed = true;

    protected const WEB_CONTROLLER = 'web';
    protected const API_CONTROLLER = 'api';

    public string $controllerType = 'web';
    public string $controller;
    public string $model;
    public string $route;
    public string $payload_key;
    public array $methods;

    public function method_is_used(string $method): void
    {
        $can_has_method = in_array($method, $this->methods);
        if ($can_has_method === false)
            $this->markTestSkipped('this method not used');

        $has_method = method_exists($this->controller, $method);
        if ($has_method === false)
            $this->markTestSkipped('method not exist');
    }
}
