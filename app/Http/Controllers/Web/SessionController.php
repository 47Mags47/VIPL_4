<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\StoreSessionRequest;
use Illuminate\Support\Facades\Auth;

class SessionController
{
    public function store(StoreSessionRequest $request)
    {

        $remember = $request->input('remember', false);

        if (Auth::attempt($request->only(['email', 'password']), $remember) or Auth::attempt($request->only(['login', 'password']), $remember))
            return user()->toResource();

        return abort(401, 'Invalid credentials');
    }

    public function destroy()
    {
        Auth::logout();

        session()->invalidate();
        session()->regenerateToken();

        return response('ok', 200);
    }
}
