<?php

namespace App\Http\Controllers;

use Tighten\Ziggy\Ziggy;

class RouteController
{
    public function index(){
        return response()->json(new Ziggy());
    }
}
