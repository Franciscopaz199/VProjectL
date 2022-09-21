<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\file;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\solution;
use App\Http\Controllers\cambioCode as partesCodigo;

class FilesController extends Controller
{
    public function subirArchivo()
    {
        return view('subirArchivo',['notificacion'=>null]);
    }

    public function guardarArchivos(Request $request)
    {

        $request->validate(
            [
                'tipo' => 'required',
                'lenguaje' => 'required',
                'image'=> 'required|image|max:2048',
                'enunciado'=> 'required',
            ]);

            // get url de la imagen
        $image = $request->file('image')->store('public/imagenes');
        $url = Storage::url($image);
        /*
        // Crear un nuevo modelo
        $table->string('lenguaje');
        $table->string('tipo');
        */
        $file = new file;
        $file->url = $url;
        $file->enunciado = $request->enunciado;
        $file->autor = Auth::user()->id;
        $file->usos = 0;
        $file->estado = false;
        $file->tipo = $request->tipo;
        $file->lenguaje = $request->lenguaje;
        $file->save();


        if($request->solucion != null)
        {
            $file->estado = true;
            $file->save();
            $this->guardarSolucion($file->id,$request->solucion);
        }

        return redirect()->route("subirArchivo")
        ->with("notificacion", "Se ha cargado el archivo exitosamente");

             
    }

    private function guardarSolucion($idArchivo, $solucion)
    {
        $nSolution = new solution;
        $nSolution->solucion = $solucion;
        $nSolution->autor = Auth::user()->id;
        $nSolution->id_files = $idArchivo;
        $nSolution->save();
    }

    public function viewFile()
    {
        return view('visualizarArchivo');
    }



    public function buscador(Request $request)
    {
        $term = $request->get('term');
        $querys = file::where('enunciado','LIKE','%'.$term.'%')->get();
        return $querys;
    }


    // redireccionar con los datos de el archivo
    public function buscarArchivo(Request $request){
        $file = file::find($request->opcion);

        $enunciado = $file->enunciado;
        
        if($file->lenguaje === 'c++')
        {
            $solucion = partesCodigo::newCode($file->solution->solucion);
        }
        else
        {
            $solucion = $file->solution->solucion;
        }

        $autor = $file->solution->autorName->name;
        $tipo = $file->tipo;
        $lenguaje = $file->lenguaje;
        $file->usos += 1;
        $imagen = $file->url;
        $file->save(); // se guarda de nuevo porque, la variable usos se incremento en uno con respecto a la anterior 

        return view('visualizarArchivo',['enunciado'=>$enunciado, 'solucion'=>$solucion,'autor'=> $autor, 'lenguaje'=>$lenguaje, 'tipo'=>$tipo , 'imagenUrl' =>$imagen]);
    }


}
