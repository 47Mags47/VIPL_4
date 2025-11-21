<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;

class UserController
{
    public function store(StoreUserRequest $request)
    {
        return User::create($request->validated())->toResource();
    }

    public function show(User $user){
        return $user->toResource();
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());

        return $user->toResource();
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response('ok', 200);
    }
}
