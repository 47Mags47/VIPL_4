<?php

namespace Tests\Cases;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

abstract class ControllerTestCase extends TestCase
{
    use RefreshDatabase;
    protected $seed = true;

    public $controller;
    public $routeName;
    public $model;
    public $payload_key;

    public $payload = [];

    public $methods = [
        'index',
        'crete',
        'store',
        'show',
        'edit',
        'update',
        'destroy',
    ];

    protected function checkMethodExistance(string $method)
    {
        if (!in_array($method, $this->methods))
            $this->markTestSkipped('Метод пропущен');

        $this->assertTrue(method_exists($this->controller, $method), 'Контроллер не имеет метода ' . $method);
    }
}
