<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\Cases\Http\Controllers\APIControllerTestCase;

class UserControllerTest extends APIControllerTestCase
{
    public string $controllerType = parent::API_CONTROLLER;

    public string $controller = UserController::class;
    public string $model = User::class;
    public string $route = 'users';
    public string $payload_key = 'user';

    public array $methods = [
        'store',
        'show',
        'update',
        'destroy'
    ];

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory(['password' => Hash::make('test')])->make();

        $this->payload = [
            'store' => array_merge($user->getAttributes(), [
                'password' => 'test',
                'password_confirmation' => 'test',
            ])
        ];
    }
}
