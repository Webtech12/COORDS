<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Coordinates;

class getCoordinates extends Controller
{
    //
    public function index()
    {
        // Getting the records
        return response()->json(Coordinates::get(), 200);
    }
}
