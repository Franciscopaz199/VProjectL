<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class HomeController extends Controller
{
    //

    public function home()
    {
        if(!(Auth::check()))
        {
             return redirect(route('sesionStar'));
        }

        return view('home');
    }

    public function index()
    {
        $usuarios = User::count();
        return view('index',['cantidadUsser' => $usuarios ]);
    }
}
