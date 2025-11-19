<?php

namespace Tests\Traits;

trait ValidAPIMethods
{
    public function test_method_is_return_valid_json_index(): void
    {
        $model = $this->model::factory()->create();

        $this->getJson(route($this->route . '.index'))
            ->assertJson([
                'data' => [$model->toResource()->jsonSerialize()]
            ]);
    }

    public function test_method_is_return_valid_json_store(): void
    {
        $payload = $this->model::factory()->make()->getAttributes();

        $response = $this->postJson(route($this->route . '.store'), $payload);

        $model = $this->model::findFromArray($payload)->first();

        $response->assertJson([
            'data' => $model->toResource()->jsonSerialize()
        ]);
    }

    public function test_method_is_return_valid_json_update(): void
    {
        $model = $this->model::factory()->create();
        $payload = $this->model::factory()->make()->getAttributes();

        $this->putJson(route($this->route . '.update', [$this->payload_key => $model->id]), $payload)
            ->assertJson(['data' => $model->refresh()->toResource()->jsonSerialize()]);
    }
}
