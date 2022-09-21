@extends('layouts.plantilla')
@section('links')
    <link rel="stylesheet" href="{{asset('css/StyleAcces.css')}}">
@endsection

@section('body')
    @if (session("permitir"))
      <div class="alert alert-success" role="alert">
        <span><li>{{session("permitir")}}</li></span>
      </div>
    @elseif (session("quitar"))
      <div class="alert alert-danger" role="alert">
        <span><li>{{session("quitar")}}</li></span>
      </div>  
    @endif
    <div class="container-table">
      <form action="{{route('otorgarRol')}}" method="POST">
        @csrf
      <table class="table">
        <thead class="fila1">
          <tr>
            <th scope="col">USSERNAME</th>
            <th scope="col">PERMITIR ACCESO</th>

          </tr>
        </thead>
        <tbody>
            
                @forelse ( $nuevos as $var )
                <tr>
                  <th scope="row">{{$var->username}}</th>
                  <th>
                      @if ($var->hasRole('usser'))
                        <input type="radio"  id="{{$var->id}}c" style="display: none;" onchange="this.form.submit()" name = "usserId" value="{{$var->id}}">
                          <label for="{{$var->id }}c" class="btn btn-danger">Quitar permiso</label>
                      @else
                        <input type="radio"  id="{{$var->id}}" style="display: none;" onchange="this.form.submit()" name = "persona" value="{{$var->id}}">
                        <label for="{{$var->id}}" class="btn btn-primary">Dar permiso</label>
                      @endif
                  </th>

                </tr>
                  
                @empty
                <th scope="row">no hay elementos que mostrar</th>
                @endforelse
           
        </tbody>
      </table>
    </form>
    </div>
@endsection