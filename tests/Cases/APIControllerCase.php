<?php

namespace Tests\Cases;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

abstract class APIControllerCase extends TestCase
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
        'store',
        'show',
        'update',
        'destroy',
    ];

    protected function checkMethodExistance(string $method)
    {
        if (!in_array($method, $this->methods))
            $this->markTestSkipped('Метод пропущен');

        $this->assertTrue(method_exists($this->controller, $method), 'Контроллер не имеет метода ' . $method);
    }

    public function test_check_index_method()
    {
        $this->checkMethodExistance('index');

        $model = $this->model::factory()->create();

        $this->getJson(route($this->routeName . '.index'))
            ->assertOk()
            ->assertJsonIsObject()
            ->assertJson(['data' => [$model->toResource()->jsonSerialize()]]);
    }

    public function test_check_store_method()
    {
        $this->checkMethodExistance('store');

        $payload = array_key_exists('store', $this->payload)
            ? $this->payload['store']
            : $this->model::factory()->make()->getAttributes();
        $response = $this->postJson(route($this->routeName . '.store'), $payload);
        $model = $this->model::findFromArray($payload)->first();

        $response
            ->assertCreated()
            ->assertJsonIsObject()
            ->assertJson(['data' => $model->toResource()->jsonSerialize()]);
    }

    public function test_check_update_method()
    {
        $this->checkMethodExistance('update');

        $model = $this->model::factory()->create();
        $payload = array_key_exists('update', $this->payload)
            ? $this->payload['update']
            : $this->model::factory()->make()->getAttributes();
        $response = $this->putJson(route($this->routeName . '.update', [$this->payload_key => $model->id]), $payload);

        $response
            ->assertOk()
            ->assertJsonIsObject()
            ->assertJson(['data' => $model->refresh()->toResource()->jsonSerialize()]);
    }

    public function test_check_destroy_method()
    {
        $this->checkMethodExistance('destroy');

        $model = $this->model::factory()->create();

        $this->deleteJson(route($this->routeName . '.destroy', [$this->payload_key => $model->id]))
            ->assertOk();
    }
}
