@extends('layouts.plantilla')
@section('links')
    <link rel="stylesheet" href="{{asset('css/StylesForViewFiles.css')}}">
    <link rel="stylesheet" href="{{asset('css/style2.css')}}" />
    <link rel="stylesheet" href="{{asset('css/highlightjs/dracula.css')}}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.5.0/highlight.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/highlightjs-line-numbers.js/dist/highlightjs-line-numbers.min.js"></script>
    <style>

		td.hljs-ln-numbers {
			text-align: center;
			color: red;
			border-right: 1px solid red;
			vertical-align: top;
			padding-right: 5px;

			-webkit-touch-callout: none;
			-webkit-user-select: none;
			-khtml-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
		}
		td.hljs-ln-code {
			padding-left: 10px;
		}

		code {
			white-space: pre-wrap;
			overflow: auto;
		}
	</style>
@endsection
@section('body')
        <div class="code">
            <h2 class="stike">Codigo</h2>
                <div class="contenedor">
                    <div class="linea"> <button id="copy-button" >Copy</button></div>
                    <div class="code-wrapper">
                  <pre>
                    <code id="code">{{$solucion}}           
                    </code>
                    </pre>
                  
                </div>
                </div>
                <span id="copy-success">se ha copiado el codigo :)</span>
        </div>
        <div class="informacion">
             <div class="text-start borde sti titu">
                <h2>Autor: {{$autor}}</h2>
                <p><b>Tipo: </b>{{$tipo}}&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <b>Lenguaje: </b> {{$lenguaje}}</p>
            </div>
            <div class="text-start borde titu">
                <h2 class="stik">Enunciado</h2>
                <p>{{$enunciado}}</p>
            </div>
            <div class="text-start borde titu">
                <h2 class="stik">Imagen</h2>
                <div class="imagen" >
                    <div class="imagen-archivo">
                        <img src="{{asset($imagenUrl)}}" alt="" class="imageC">
                    </div>
                </div>
            </div>
        </div>
    
@endsection

@section('scripts')
    <script src="{{asset('js/main.js')}}"></script>
@endsection

