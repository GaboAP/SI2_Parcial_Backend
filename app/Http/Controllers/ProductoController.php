<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Inventario;
use App\Models\producto;
use App\Models\User;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = producto::paginate();
        return response()->json($productos, 200);
    }
    public function search(Request $request)
    {
        $productos = producto::where('nombre', 'like', '%' . $request->nombre . '%')->paginate(10);
        
        if ($productos->count() > 0) {
            $productos->load('categoria'); // Cargamos la relación con la categoría
    
            return response()->json([
                'message' => "Se encontraron productos",
                'data' => $productos,
                'status_code' => 200
            ]);
        } else {
            return response()->json([
                'message' => "No se encontró ningún producto",
                'status_code' => 404
            ]);
        }
    }
    public function getById($idProducto)
    {
        $producto = producto::find($idProducto);
        if ($producto) {
            return response()->json([
                'message' => "Se encontró el producto",
                'data' => $producto,
                'status_code' => 200
            ]);
        } else {
            return response("No se encontró el producto",404);
        }
    }
    //i love you
    public function store(Request $request)
    {
        // return $request->all();
        $producto = new Producto;

        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->talla = $request->talla;
        $producto->color = $request->color;
        $producto->foto = $request->foto;
        // Asigna las relaciones utilizando los objetos de los modelos
        $producto->idUsuario = $request->idUsuario;
        $producto->idInventario = $request->idInventario;
        $producto->categoriaId = $request->categoriaId;
    
        $producto->save();
    
        return response()->json([
            'message' => "$request->nombre",
            'id' => $producto->idProducto,
            'status_code' => 201
        ]);
    }
}
