<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    //

    public function inicioSesion()
    {
        if(Auth::check())
        {
             return redirect(route('home'));
        }

        return view('inicioSesion');
    }

    public function iniciarSesion(Request $request){
        
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect(route('home'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function cerrarSesion()
    {
        auth()->logout();
        return redirect()->to(route('index'));
    }
}
