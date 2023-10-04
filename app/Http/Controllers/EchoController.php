<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EchoController extends Controller
{
    public function getEcho()
    {
        return response()->json([
            'message' => "Hola mundo",
            'status_code' => 200
        ]);
    }

    public function postEcho(Request $request)
    {
        $nombre = $request->input('nombre');
        $responseMessage = "Hola $nombre";

        return response()->json([
            'message'=>$responseMessage,
            'status_code'=>201
        ]);
    }
}