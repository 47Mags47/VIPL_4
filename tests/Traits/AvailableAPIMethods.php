<?php

namespace Tests\Traits;

trait AvailableAPIMethods
{
    public function test_method_is_available_index(): void
    {
        $this->getJson(route($this->route . '.index'))
            ->assertOk();
    }

    public function test_method_is_available_store(): void
    {
        $payload = $this->model::factory()->make()->getAttributes();

        $this->postJson(route($this->route . '.store'), $payload)
            ->assertCreated();
    }

    public function test_method_is_available_update(): void
    {
        $model = $this->model::factory()->create();
        $payload = $this->model::factory()->make()->getAttributes();

        $this->putJson(route($this->route . '.update', [$this->payload_key => $model->id]), $payload)
            ->assertOk();
    }

    public function test_method_is_available_destroy(): void
    {
        $model = $this->model::factory()->create();

        $this->deleteJson(route($this->route . '.destroy', [$this->payload_key => $model->id]))
            ->assertOk();
    }
}
