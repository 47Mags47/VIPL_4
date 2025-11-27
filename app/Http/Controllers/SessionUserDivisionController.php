<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSessionUserDivisionRequest;

class SessionUserDivisionController
{
    public function index(){
        return user()->divisions->toResourceCollection();
    }

    public function store(StoreSessionUserDivisionRequest $request) {
        session()->put('session.division_id', $request->input('division_id'));

        return response('ok', 200);
    }
}
