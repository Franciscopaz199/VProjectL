@extends('layouts.plantilla')
@section('links')
    <link rel="stylesheet" href="{{asset('css/plantillaStyle.css')}}">
    <link rel="stylesheet" href="{{asset('codeMirror/lib/codemirror.css')}}">
    <script src="{{asset('codeMirror/lib/codemirror.js')}}"></script>
    <script src="{{asset('codeMirror/addon/edit/matchbrackets.js')}}"></script>
    <script src="{{asset('codeMirror/addon/edit/closetag.js')}}"></script>
    <script src="{{asset('codeMirror/mode/clike/clike.js')}}"></script>
    <link rel="stylesheet" href="{{asset('codeMirror/theme/dracula.css')}}">
@endsection

@section('body')
    <div class="container-fluid">
        <div class="izquierda">
            <div class="text-start borde">
                <h2>Bienvenido {{auth()->user()->username}}</h2>
                <p><b>&nbsp &nbsp &nbsp#Nota:</b> Si no vas a hacer un aporte real por favor <b>NO</b> subas archivos </p>
                <p><b>&nbsp&nbsp&nbsp#Nota:</b> Si no tienes la solucion al ejercicio que estas subiendo porfavor <b>NO</b> subas nada</p>
            </div>
        @if ($errors->any())
            <br>
            <div class="notification">
               </div>
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error )
                        <li>{{$error}}</li>            
                    @endforeach
                    </ul>
            </div>
        @endif
        @if (session("notificacion"))
        <div class="alert alert-success" role="alert">
            <span><li>{{session("notificacion")}}</li></span>
          </div>
        @endif
       
        </div>
        <div class="derecha">
                <div class="formularios">
                   <h2>subiendo archivo</h2>
                    <form action="{{route('guardarArchivos')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="lineaContainer">
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="">Selecciona el tipo de archivo</label>
                                            <select class="form-select" aria-label="Default select example" name="tipo">
                                                <option value="">Tipo archivo</option>
                                                <option value="VPL">VPL</option>
                                                <option value="Foro">Foro</option>
                                                @php
                                                /*
                                                    <option value="3">otro</option>
                                                */
                                                @endphp
                                            </select>
                                            
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="">Selecciona el lenguaje</label>
                                                <select class="form-select" aria-label="Default select example" name="lenguaje">
                                                    <option value="">Lenguaje</option>
                                                    <option value="c++">C++</option>
                                                    <option value="Pseint">Pseint</option>
                                                    @php
                                                    /*
                                                        <option value="3">otro</option>
                                                    */
                                                    @endphp
                                                </select>
                                                
                                            </div>
                                        </div> 
                                </div>
                            </div>
                          

                        
                        <div class="form-group">
                            <div class="custom-file">
                                <label for="">Imagen de Archivo</label><br>
                                <input type="file" name="image" class="custom-file-input" id="customFile" accept="image/*">
                                @error('file')
                                    <br><small class="text-danger">{{$message}}</small><br>
                                @enderror
                                <label class="custom-file-label" for="customFile">Subir Imagen</label>
                                <strong>archivo:</strong>
                                <span id="file-name">ninguno seleccionado</span>
                              </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Enunciado </label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="enunciado"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Solucion <small>(opcional)</small></label>
                            <textarea class="form-control cpp-code" id="cpp-code" rows="3" name="solucion"></textarea>                
                        </div>


                        <?php /*
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Pasos <small>(opcional)</small></label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="explicacion"></textarea>
                        </div>
                        */
                        ?>
                        <br>
                         <div class="form-group">
                            <input type="submit"  value="enviar" class="btn btn-primary">
                         </div>
                    </form>
                </div>
          
            
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        var cppEditor = CodeMirror.fromTextArea(document.getElementById("cpp-code"), {
             lineNumbers: true,
              matchBrackets: true,
              mode: "text/x-c++src",
              theme: "dracula",
              autoCloseTags:true
      });
      let inputFile = document.getElementById('customFile');
      let fileName = document.getElementById('file-name');
      let label =  document.querySelector(".custom-file-label");
      inputFile.addEventListener('change', (event)=>{
            label.setAttribute("class", "active");
            let uploadFile =event.target.files[0].name;
            fileName.textContent = uploadFile; 
      });
    </script>
@endsection

