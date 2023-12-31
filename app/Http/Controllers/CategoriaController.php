<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        return response()->json($categorias, 200);
    }
    public function search($request){
        if(Categoria::find($request->categoriaId)->first()){
            $categoria=Categoria::find($request->categoriaId)->first();
            return response()->json([
                'message'=>$categoria->nombre,
                'id'=>$categoria->categoriaId,
                'status_code'=>200]);
        }
        return response()->json([
                'message'=>"No existe la categoria",
                'status_code'=>404]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categoria= new Categoria;

        $categoria->nombre=$request->nombre;
        $categoria->save();
        return response()->json([
            'message'=>"$request->nombre",
            'id'=>"$categoria->categoriaId",
            'status_code'=>201
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        return response()->json($categoria, 200, ['Content-Type' => 'application/json; charset=utf-8'], JSON_PRETTY_PRINT); //aqui se redirigiria a la vista de show y se le enviaria el objeto
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        $categoria->nombre=$request->nombre;
        $categoria->save();
        return redirect()->route('categoria.show',$categoria);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return $this->show($categoria);
    }
}
