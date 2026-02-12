<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;

class UserController
{
    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated());

        $user->divisions()->attach($request->input('division_id'));

        return $user->toResource();
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
