<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\Cases\APIControllerCase;

class UserControllerTest extends APIControllerCase
{
    public $controller = UserController::class;
    public $routeName = 'users';
    public $model = User::class;
    public $payload_key = 'user';

    public $methods = [
        'store',
        'show',
        'update',
        'destroy'
    ];

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->make(['password' => Hash::make('test')]);

        $this->payload = [
            'store' => array_merge($user->getAttributes(), [
                'password' => 'test',
                'password_confirmation' => 'test',
            ])
        ];
    }
}
