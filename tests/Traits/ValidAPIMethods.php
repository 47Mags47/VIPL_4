<?php

namespace Tests\Traits;

trait ValidAPIMethods
{
    public function test_method_is_return_valid_json_index(): void
    {
        $this->method_is_used('index');

        $model = $this->model::factory()->create();

        $this->getJson(route($this->route . '.index'))
            ->assertJson([
                'data' => [$model->toResource()->jsonSerialize()]
            ]);
    }

    public function test_method_is_return_valid_json_store(): void
    {
        $this->method_is_used('store');

        $payload = array_key_exists('store', $this->payload)
            ? $this->payload['store']
            : $this->model::factory()->make()->getAttributes();

        $response = $this->postJson(route($this->route . '.store'), $payload)
            ->assertCreated();

        $model = $this->model::findFromArray($payload)->first();

        $response->assertJson([
            'data' => $model->toResource()->jsonSerialize()
        ]);
    }

    public function test_method_is_return_valid_json_update(): void
    {
        $this->method_is_used('update');

        $model = $this->model::factory()->create();
        $payload = array_key_exists('update', $this->payload)
            ? $this->payload['update']
            : $this->model::factory()->make()->getAttributes();

        $this->putJson(route($this->route . '.update', [$this->payload_key => $model->id]), $payload)
            ->assertJson(['data' => $model->refresh()->toResource()->jsonSerialize()]);
    }
}
