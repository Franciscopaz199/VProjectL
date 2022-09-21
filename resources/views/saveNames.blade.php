@extends('layouts.plantilla')
@section('links')
    <link rel="stylesheet" href="{{asset('css/estylosSubirNombres.css')}}">
@endsection
 @section('body')
    @if ($errors->any())
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
      <div class="formulario">
    
        <form action="{{route('saveNamesP')}}" method="POST">
            @csrf
            <div class="imagen">
                <img src="{{asset('img/iconoblanco.png')}}" alt="" class="imagenPrincipal">
                <label for="" style="color: white;">Subiendo Nombres</label>
            </div>
          
            <div class="seleccionarTipo">
                <div class="form-group">
                    <div class="form-row">
                        <div class="col">
                            <label for="" style="color: white; ">Selecciona el tipo</label>
                           
                            <select class="form-select " aria-label="Default select example" name="tipo">
                                <option value="">Tipo</option>
                                <option value="int">int</option>
                                <option value="char">char</option>
                                <option value="double">double</option>
                                <option value="float">float</option>
                                <option value="void">void</option>
                                <option value="bool">bool</option>
                              </select>
                              
                        </div>
                      </div> 
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col">
                            <label for="" style="color: white;">Selecciona el campo</label>
                            <select class="form-select" aria-label="Default select example" name="campo">
                                <option value="">Campo</option>
                                <option value="variable">variable</option>
                                <option value="funcion">funcion</option>
                                
                              </select>
                              
                        </div>
                      </div> 
                </div>
                
            </div>
            <br>
            <div class="form-group">
                <label for="exampleInputPassword1" style="color: white; ">Nombre</label>
                <input type="text" class="form-control @error('name')
                     is-invalid
                @enderror  " id="exampleInputPassword1" placeholder="Nombre" name="name">
              </div><br>
              <input type="submit" value="enviar" class="btn btn-primary"><br>
        </form>
      </div>
      
 @endsection