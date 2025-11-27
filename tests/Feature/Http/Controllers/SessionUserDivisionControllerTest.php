<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\SessionUserDivisionController;
use App\Models\Division;
use App\Models\User;
use Tests\Cases\ControllerTestCase;

class SessionUserDivisionControllerTest extends ControllerTestCase
{
    public $controller = SessionUserDivisionController::class;
    public $routeName = 'session.user-division';

    public $methods = [
        'index',
        'store'
    ];

    public function test_check_index_method()
    {
        $this->checkMethodExistance('index');

        $user = User::factory()->create();

        $this->actingAs($user)
            ->getJson(route($this->routeName . '.index'))
            ->assertOk()
            ->assertJsonIsObject()
            ->assertJsonFragment($user->divisions->toResourceCollection()->jsonSerialize());
    }

    public function test_check_store_method()
    {
        $this->checkMethodExistance('store');

        $user = User::factory()->create();
        $division = Division::factory()->create();
        $user->divisions()->attach($division);

        $this->actingAs($user)
            ->postJson(route($this->routeName . '.store'), ['division_id' => $division->id])
            ->assertOk()
            ->assertSessionHas('session.division_id', $division->id);
    }

}
