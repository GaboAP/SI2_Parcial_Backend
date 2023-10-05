<?php

namespace App\Http\Controllers;

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
    
        if (Auth::attempt($credentials)) {
            return response()->json([
                'message'=> "Logeado con éxito",
                'status_code'=>200]); // Retorna un mensaje de éxito
        }
    
        return response()->json([
            'message'=> "Logeado sin éxito",
            'status_code'=>400]); // Retorna un mensaje de fracaso
    }public function logout(Request $request)
    {
        Auth::logout();
     
        // $request->session()->invalidate();
     
        // $request->session()->regenerateToken();
     
        return response()->json([
            'message'=>"Deslogeau papulince",
            'status_code'=>200]);
    }
}
