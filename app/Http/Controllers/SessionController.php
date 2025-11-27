<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSessionRequest;
use Illuminate\Support\Facades\Auth;

class SessionController
{
    public function store(StoreSessionRequest $request)
    {
        if (Auth::attempt($request->only(['email', 'password']), $request->input('remember') ?? false))
            return user()->toResource();

        return back()->withErrors(['email' => 'Неверный логин или пароль'])->onlyInput('email');
    }

    public function destroy()
    {
        Auth::logout();

        session()->invalidate();
        session()->regenerateToken();

        return response('ok', 200);
    }
}
