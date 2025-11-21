<?php

namespace Tests\Traits;

trait AvailableAPIMethods
{
    public function test_method_is_available_index(): void
    {
        $this->method_is_used('index');

        $this->getJson(route($this->route . '.index'))
            ->assertOk();
    }

    public function test_method_is_available_store(): void
    {
        $this->method_is_used('store');

        $payload = array_key_exists('store', $this->payload)
            ? $this->payload['store']
            : $this->model::factory()->make()->getAttributes();

        $this->postJson(route($this->route . '.store'), $payload)
            ->assertCreated();
    }

    public function test_method_is_available_update(): void
    {
        $this->method_is_used('update');

        $model = $this->model::factory()->create();
        $payload = array_key_exists('update', $this->payload)
            ? $this->payload['update']
            : $this->model::factory()->make()->getAttributes();

        $this->putJson(route($this->route . '.update', [$this->payload_key => $model->id]), $payload)
            ->assertOk();
    }

    public function test_method_is_available_destroy(): void
    {
        $this->method_is_used('destroy');

        $model = $this->model::factory()->create();

        $this->deleteJson(route($this->route . '.destroy', [$this->payload_key => $model->id]))
            ->assertOk();
    }
}
