


 @extends('layouts.plantilla')

 @guest
    @section('body')
    <div class="text-start borde">
        <h2>Para tener acceso a esta pagina</h2>
        <p>debes de <a href="{{route('sesionStar')}}">Iniciar Sesion</a></p>
    </div>
    @endsection
@else
  @can('buscar')
   
    @section('links')
        <link rel="stylesheet" href="{{asset('css/StylestoHome.css')}}">
    @endsection
    @section('body')
    <div class="contenedor">
        <div class="stick">
            <div class="imagen">
                <img src="{{asset('img/iconoazul.png')}}" alt="" class="imagenPrincipal">
            </div>
                <div class="input-group">
                    <div class="contenedor-buscador">
                        <div class="lupa">
                            <i class="fa fa-search"></i>
                        </div>
                        
                            <input type="search" id="search" placeholder="¿Qué quieres buscar?"   />
                        
                    </div>
                </div>
        
        </div>
        <form action="{{route('buscarArchivo')}}" method="POST" class="FormularioBuscador">
            @csrf
            <div class="resultados">  
            </div>
        </form>
    </div>
    @endsection
    @section('scripts') 
    <script src="{{asset('jquery/jquery-3.6.1.min.js')}}"></script>
    <script>
        var variable = "{{route('buscador')}}";
    </script>
    <script src="{{asset('js/buscador.js')}}"></script>
    @endsection
  @else

    @section('links')
        <link rel="stylesheet" href="{{asset('css/StylosPermissos.css')}}">
    @endsection
    @section('body')
        <div class="textContainer">
            <h1>Hola {{auth()->user()->username}}</h1>
            <h4>Aun no cuentas con los <b>permisos</b></h4>
            <h4>necesarios para buscar </h4> 
            <h1>: (</h1>
        </div>

    @endsection
  @endcan
@endguest

   






