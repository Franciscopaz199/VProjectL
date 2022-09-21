<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Name;
class saveNames extends Controller
{
    //
    public function saveNames(){
        return view('saveNames');
        
    }
    public function saveNamesP(Request $request)
    {
       
        $request->validate(
            [

                'name'=> 'required|unique:names,name',
                'tipo'=> 'required',
                'campo'=> 'required',
            ]);
          

        $nombreVF = new Name;
        $nombreVF->name = $request->name;
        $nombreVF->tipo = $request->tipo;
        $nombreVF->campo = $request->campo;
        $nombreVF->save();

        return redirect()->route("saveNames")
        ->with("notificacion", "Se ha cargado el archivo exitosamente");
    }
}
