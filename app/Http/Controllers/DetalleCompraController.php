<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\compra;
use App\Models\DetalleCompra;
use App\Models\producto;
use Illuminate\Http\Request;

class DetalleCompraController extends Controller
{
    
    public function store(Request $request){
        // $idProducto = $request->input('idProducto');
        // $cantidad = $request->input('cantidad');
        // $idCarrito = $request->input('idCarrito');
        // $idUsuario=$request->input('idUsuario');
        $carrito = Carrito::find($request->idCarrito);

        if(!$carrito){
            $carrito = new Carrito();
            $carrito->estado=1;
            $carrito->idUsuario=$request->idUsuario;
        }
        $producto=producto::find($request->idProducto);
        $carrito->total=$carrito->total+($producto->precio*$request->cantidad);
        $carrito->save();

        $detalleCompra = new DetalleCompra();
        $detalleCompra->idProducto = $request->idProducto;
        $detalleCompra->cantidadCompra = $request->cantidad;
        $detalleCompra->idCarrito=$carrito->id;
        $detalleCompra->save();
        return response()->json([
            "message" => "Se ha creado un detalle de compra",
            "id" => $detalleCompra->id,
            "data"=>$detalleCompra,
            "idCarrito"=>$carrito->id,
            "status_code" => 201
        ]);
    }

    public function getByCarritoId(Request $request){

        $detalleCompra = DetalleCompra::where('idCarrito',$request->idCarrito)->join('productos','detalleCompra.idProducto','=','productos.idProducto')->get();
        if($detalleCompra){
            return response()->json([
                "message" => "Se encontraron detalles de compra",
                "data" => $detalleCompra,
                "status_code" => 200
            ]);
        }else{
            return response()->json([
                "message" => "No se encontraron detalles de compra",
                "status_code" => 404
            ]);
        }
    }
    //destroy method by id
    public function destroy($id){
        $detalleCompra = DetalleCompra::find($id);
        if($detalleCompra){
            $detalleCompra->delete();
            return response()->json([
                "message" => "Se ha eliminado un detalle de compra",
                "status_code" => 200
            ]);
        }else{
            return response()->json([
                "message" => "No se encontró el detalle de compra",
                "status_code" => 404
            ]);
        }
    }
}
