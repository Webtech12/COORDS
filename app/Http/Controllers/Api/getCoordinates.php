<?php

namespace App\Http\Controllers\Api;

use App\Events\StatusLiked;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Coordinates;

class getCoordinates extends Controller
{
    //
    public function index()
    {
        // Getting the records
        $res = response()->json(Coordinates::select("WGSLat", "WGSLong", "TargetId")->limit(3)->get(),200);
        // $res = 'this';
        // print_r($res);die;
        event(new StatusLiked($res));
        return $res;
    }
}
