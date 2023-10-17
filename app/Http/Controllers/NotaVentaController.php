<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\NotaVenta;
use Illuminate\Http\Request;

class NotaVentaController extends Controller
{
    public function store(Request $request){
        $notaVenta = new NotaVenta();
        $notaVenta->nombre = $request->nombre;
        $notaVenta->nit = $request->nit;
        $notaVenta->metodoPago = $request->metodoPago;
        $carrito=Carrito::find($request->id);
        $carrito->estado=0;
        $carrito->save();
        $notaVenta->save();
        return response()->json([
            "message" => "Se ha creado una nota de venta",
            "id" => $notaVenta->idNotaVenta,
            "status_code" => 201
        ]);
    }
}
