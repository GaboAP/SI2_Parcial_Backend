<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function index(){
        $inventarios = Inventario::all();
        return response()->json($inventarios, 200);
    }
    public function getById($idInventario)
    {
        if($inventario = Inventario::find($idInventario)){
            return response()->json([
                'message'=>"Se encontró el inventario",
                'stock'=>$inventario->stock,
                'status_code'=>200]);
        }
        return response("No existe el inventario",404);
    }
}
