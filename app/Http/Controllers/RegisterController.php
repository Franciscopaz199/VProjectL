<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    //
    public function show()
    {
        if(Auth::check())
        {
             return redirect(route('home'));
        }
       return view('Authregister');
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated())->assignRole('nuevo');
        $request->session()->regenerate();
        return redirect(route('registershow'))->with('success','account created succefully');
    }

}

