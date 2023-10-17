<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $userId=User::where('email',$request->email)->first();
        $carrito=Carrito::where('idUsuario',$userId->idUsuario)
        ->where('estado',1)->first();
        $idCarrito=0;
        if($carrito){
            $idCarrito=$carrito->id;
        }
        if (Auth::attempt($credentials)) {
            return response()->json([
                'message'=> $userId->idUsuario,
                'idCarrito'=>$idCarrito,
                'status_code'=>200]); // Retorna un mensaje de éxito
        }
    
        return response("Logeado sin exito",400); // Retorna un mensaje de fracaso
    }
    public function getCurrentId(){
        if (Auth::check()) {
            // El usuario está autenticado, puedes obtener su ID de la siguiente manera:
            $idUsuario = Auth::id();
            return response()->json($idUsuario,200);
        } else {
            // El usuario no está autenticado
            return 'Usuario no autenticado';
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
     
        // $request->session()->invalidate();
     
        // $request->session()->regenerateToken();
     
        return response()->json([
            'message'=>"Deslogeau papulince",
            'status_code'=>200]);
    }
}
