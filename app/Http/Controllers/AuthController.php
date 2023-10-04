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
            return 'Logeado con éxito'; // Retorna un mensaje de éxito
        }
    
        return 'Logeado sin éxito'; // Retorna un mensaje de fracaso
    }

    protected function attemptLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        return Auth::attempt($credentials, $request->filled('remember'));
    }
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
