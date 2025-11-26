<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\SessionController;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class SessionControllerTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    protected $seed = true;

    public array $methods = [
        'store',
        'destroy'
    ];

    ### STORE
    ##################################################
    public function test_controller_has_method_store()
    {
        $this->assertTrue(method_exists(SessionController::class, 'store'));
    }

    public function test_method_is_available_store()
    {
        $user = User::factory()->create(['password' => Hash::make('test')]);

        $this->postJson(route('session.store'), [
            'email' => $user->email,
            'password' => 'test',
            'remember' => true,
        ])
            ->assertOk();
    }

    public function test_store_method_create_session()
    {
        $user = User::factory()->create(['password' => Hash::make('test')]);
        $this->postJson(route('session.store'), [
            'email' => $user->email,
            'password' => 'test',
            'remember' => true,
        ]);

        $this->assertAuthenticated();
        $this->assertAuthenticatedAs($user);
    }

    ### DESTROY
    ##################################################
    public function test_controller_has_method_destroy()
    {
        $this->assertTrue(method_exists(SessionController::class, 'destroy'));
    }

    public function test_method_is_available_destroy()
    {
        $user = User::factory()->create(['password' => Hash::make('test')]);
        $this->actingAs($user);

        $this->deleteJson(route('session.destroy'))->assertOk();
    }

    public function test_destroy_method_delete_session() {
        $user = User::factory()->create(['password' => Hash::make('test')]);
        $this->actingAs($user);

        $this->deleteJson(route('session.destroy'));

        $this->assertGuest();
    }
}
