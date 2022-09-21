<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\user;
class accesController extends Controller
{
    // redireccionar a la pagina
    public function permitirAcceso()
    {
        $nuevos = User::whereHas("roles", function($q){ $q->where("name", "nuevo")->orWhere("name","usser"); })->get();
         
        return view('permitirAcceso',['nuevos'=>$nuevos]);
    }

    // hacer el proceso por metodo POST 
    public function otorgarRol(Request $request)
    {
        if($request->persona)
        {
            $usuario = User::find($request->persona);
            $usuario->removeRole('nuevo');
            $usuario->assignRole('usser');
            $mensaje = "Se le ha dado el permiso de buscar a ".$usuario->name;
            $var = 'permitir';
        }
        else
        {
            $usuario = User::find($request->usserId);
            $usuario->removeRole('usser');
            $usuario->assignRole('nuevo');
            $mensaje = "Se le ha quitado el permiso de buscar a ".$usuario->name;
            $var = 'quitar';
        }
         
        return redirect()->route('permitirAcceso')
        ->with($var,$mensaje);

    }
}
