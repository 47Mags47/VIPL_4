<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Bank;
use Tests\TestCase;

class BankControllerTest extends TestCase
{
    public function test_banks_index(): void
    {
        $bank = Bank::factory()->create();

        $this->getJson(route('banks.index'))
            ->assertOk()
            ->assertJson([
                'data' => [$bank->toResource()->jsonSerialize()]
            ]);
    }

    public function test_banks_create(): void
    {
        $model = Bank::factory()->make();
        $payload = $model->getAttributes();

        $response = $this->postJson(route('banks.store'), $payload)
            ->assertCreated();

        $this->assertDatabaseHas(Bank::getTableName(), $model->toArray());

        $bank = Bank::find($payload)->first();
        $response->assertJson([
            'data' => $bank->toResource()->jsonSerialize()
        ]);
    }

    public function test_banks_update(): void
    {
        $bank = Bank::factory()->create();
        $payload = Bank::factory()->make()->toArray();

        $this->putJson(route('banks.update', ['bank' => $bank->id]), $payload)
            ->assertOk()
            ->assertJson(['data' => $bank->refresh()->toResource()->jsonSerialize()]);

        $this->assertDatabaseHas(Bank::getTableName(), $payload);
    }

    public function test_banks_delete(): void
    {
        $bank = Bank::factory()->create();

        $this->deleteJson(route('banks.destroy', ['bank' => $bank->id]))
            ->assertOk();

        $this->assertDatabaseMissing(Bank::getTableName(), $bank->toArray());
    }
}
