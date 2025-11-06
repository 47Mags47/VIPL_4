<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Writer;
use Tests\TestCase;

class WriterControllerTest extends TestCase
{
    public function test_writers_index(): void
    {
        $writer = Writer::factory()->create();

        $this->getJson(route('writers.index'))
            ->assertOk()
            ->assertJson([
                'data' => [$writer->toResource()->jsonSerialize()]
            ]);
    }

    public function test_writers_create(): void
    {
        $model = Writer::factory()->make();
        $payload = $model->getAttributes();

        $response = $this->postJson(route('writers.store'), $payload)
            ->assertCreated();

        $this->assertDatabaseHas(Writer::getTableName(), $model->toArray());

        $writer = Writer::find($payload)->first();
        $response->assertJson([
            'data' => $writer->toResource()->jsonSerialize()
        ]);
    }

    public function test_writers_update(): void
    {
        $writer = Writer::factory()->create();
        $payload = Writer::factory()->make()->toArray();

        $this->putJson(route('writers.update', ['writer' => $writer->id]), $payload)
            ->assertOk()
            ->assertJson(['data' => $writer->refresh()->toResource()->jsonSerialize()]);

        $this->assertDatabaseHas(Writer::getTableName(), $payload);
    }

    public function test_writers_delete(): void
    {
        $writer = Writer::factory()->create();

        $this->deleteJson(route('writers.destroy', ['writer' => $writer->id]))
            ->assertOk();

        $this->assertDatabaseMissing(Writer::getTableName(), $writer->toArray());
    }
}
